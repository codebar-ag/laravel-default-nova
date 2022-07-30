<?php

use CodebarAg\LaravelDefaultNova\Traits\NovaCustomOrderTrait;
use CodebarAg\LaravelDefaultNova\Traits\NovaIdentificationPanelTrait;
use CodebarAg\LaravelDefaultNova\Traits\NovaLanguageTrait;
use CodebarAg\LaravelDefaultNova\Traits\NovaTimestampsPanelTrait;

it('nova: identification panel trait', function () {
    $trait = $this->getObjectForTrait(NovaIdentificationPanelTrait::class);
    $panel = $trait->identificationPanel();
    expect($trait)->toBeObject()
        ->and($panel->name)->toBe(trans('default-nova::nova.panels.identification.title'));
})->group('nova', 'identification');

it('nova: timestamps panel trait', function () {
    $trait = $this->getObjectForTrait(NovaTimestampsPanelTrait::class);
    $panel = $trait->timestampsPanel();
    expect($trait)->toBeObject()
        ->and($panel->name)->toBe(trans('default-nova::nova.panels.timestamps.title'));
})->group('nova', 'timestamps');

it('nova: custom order trait', function () {
    $trait = $this->getObjectForTrait(NovaCustomOrderTrait::class);
    expect($trait)->toBeObject();
})->group('nova', 'custom-order');

it('nova: language trait', function () {
    $trait = $this->getObjectForTrait(NovaLanguageTrait::class);
    expect($trait)->toBeObject();
})->group('nova', 'language');
