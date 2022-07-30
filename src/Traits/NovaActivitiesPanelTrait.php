<?php

namespace CodebarAg\LaravelDefaultNova\Traits;

trait NovaActivitiesPanelTrait
{
    public static function createButtonLabel()
    {
        if (!defined('self::RESOURCE_KEY')) {
            return parent::createButtonLabel();
        }

        return 'app/nova/resources.' . self::RESOURCE_KEY . __('app/nova/fields.create');
    }

    public static function updateButtonLabel()
    {
        if (!defined('self::RESOURCE_KEY')) {
            return parent::updateButtonLabel();
        }

        return 'app/nova/resources.' . self::RESOURCE_KEY . __('app/nova/fields.update');
    }

    public static function label()
    {
        if (!defined('self::RESOURCE_KEY')) {
            return parent::label();
        }

        return __('app/nova/resources.' . self::RESOURCE_KEY . '_plural');
    }

    public static function singularLabel()
    {
        if (!defined('self::RESOURCE_KEY')) {
            return parent::singularLabel();
        }

        return __('app/nova/resources.' . self::RESOURCE_KEY . '_singular');
    }
}
