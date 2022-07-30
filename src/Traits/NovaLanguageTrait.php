<?php

namespace CodebarAg\LaravelDefaultNova\Traits;

trait NovaLanguageTrait
{
    public static function createButtonLabel()
    {
        if (! defined('self::RESOURCE_KEY')) {
            return parent::createButtonLabel();
        }

        return __('default-nova::nova.resources.'.self::RESOURCE_KEY.'.singular').' '.__('default-nova::nova.resources.create');
    }

    public static function updateButtonLabel()
    {
        if (! defined('self::RESOURCE_KEY')) {
            return parent::updateButtonLabel();
        }

        return __('default-nova::nova.resources.'.self::RESOURCE_KEY.'.singular').' '.__('default-nova::nova.resources.update');
    }

    public static function label()
    {
        if (! defined('self::RESOURCE_KEY')) {
            return parent::label();
        }

        return __('default-nova::nova.resources.'.self::RESOURCE_KEY.'.plural');
    }

    public static function singularLabel()
    {
        if (! defined('self::RESOURCE_KEY')) {
            return parent::singularLabel();
        }

        return __('default-nova::nova.resources.'.self::RESOURCE_KEY.'.singular');
    }
}
