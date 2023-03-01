<img src="https://banners.beyondco.de/laravel-default-nova.png?theme=light&packageManager=composer+require&packageName=codebar-ag%2Flaravel-default-nova&pattern=architect&style=style_2&description=Boilerplate+integration+for+Laravel+Nova+Projects+at+codebar+Solutions+AG.&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg">

# laravel-default-nova

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codebar-ag/laravel-default-nova.svg?style=flat-square)](https://packagist.org/packages/codebar-ag/laravel-default-nova)
[![run-tests](https://github.com/codebar-ag/laravel-default-nova/actions/workflows/run-tests.yml/badge.svg)](https://github.com/codebar-ag/laravel-default-nova/actions/workflows/run-tests.yml)
[![PHPStan](https://github.com/codebar-ag/laravel-default-nova/actions/workflows/phpstan.yml/badge.svg)](https://github.com/codebar-ag/laravel-default-nova/actions/workflows/phpstan.yml)
[![GitHub Code Style Action Status](https://github.com/codebar-ag/laravel-default-nova/actions/workflows/fix-php-code-style-issues.yml/badge.svg)](https://github.com/codebar-ag/laravel-default-nova/actions/workflows/fix-php-code-style-issues.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/codebar-ag/laravel-default-nova.svg?style=flat-square)](https://packagist.org/packages/codebar-ag/laravel-default-nova)

## Installation

You can install the package via composer:

```bash
composer require codebar-ag/laravel-default-nova
```

### NovaServiceProvider

```php
<?php

namespace App\Providers;

use CodebarAg\LaravelDefaultNova\Providers\CustomNovaServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;

class NovaServiceProvider extends CustomNovaServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return Auth::check();
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
    }

}
```

### Config

```php
<?php

return [

    'prevent_lazy_loading' => app()->isLocal(),
    'with_breadcrumbs' => true,
    'without_notifications' => false,
    'resource_in' => 'Nova/Models',

    //'initial_path' => '/resources/users',
    //'assets' => ['js/nova.js', 'css/nova.css'],

    'policies' => [
        'namespace' => 'App\\Policies\\Nova\\',
    ],

];
```
## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/codebar-ag/laravel-default-nova-nova/blob/main/.github/CONTRIBUTING.md) for
details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Sebastian Fix](https://github.com/StanBarrows)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
