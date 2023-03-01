<?php

namespace CodebarAg\LaravelDefaultNova\Providers;

use Laravel\Nova\Nova;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\NovaApplicationServiceProvider;

class CustomNovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::serving(function (): void {
            $preventLazyLoading = config('laravel-default-nova.prevent_lazy_loading');
            Model::preventLazyLoading($preventLazyLoading);
        });

        if (config('laravel-default-nova.with_breadcrumbs')) {
            Nova::withBreadcrumbs();
        }

        if (config('laravel-default-nova.without_notifications')) {
            Nova::withoutNotificationCenter();
        }

        $assets = config('laravel-default-nova.assets');

        if ($assets) {
            foreach ($assets as $asset) {
                Nova::script('custom', $asset);
            }
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $resourceIn = config('laravel-default-nova.resource_in');

        if ($resourceIn) {
            Nova::resourcesIn($resourceIn);
        }

        $initialPath = config('laravel-default-nova.initial_path');

        if ($initialPath) {
            Nova::initialPath($initialPath);
        }

        Nova::serving(function () {
            Gate::guessPolicyNamesUsing(function ($class) {
                $namespace = config('laravel-default-nova.policies.namespace');
                return $namespace . class_basename($class) . 'Policy';
            });
        });
    }

}
