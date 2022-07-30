<?php

namespace CodebarAg\LaravelDefaultNova\Traits;

use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Panel;

trait NovaIdentifierPanelTrait
{
    public function identifierPanel($displayId = true, $displayUuid = false, $displayIdentification = false, $displayBarcode = false, $limit = 1)
    {
        return (new Panel(__('backend/panels.identifier'), $this->identifier($displayId, $displayUuid, $displayIdentification, $displayBarcode)))->limit($limit);
    }

    public function identifier($displayId, $displayUuid, $displayIdentification, $displayBarcode)
    {
        $values = [];

        if ($displayId) {
            $values[] = $this->identifierGetId();
        }

        if ($displayUuid) {
            $values[] = $this->identifierGetUuid();
        }

        if ($displayIdentification) {
            $values[] = $this->identifierGetIdentification();
        }

        if ($displayBarcode) {
            $values[] = $this->identifierBarcode();
        }

        return $values;
    }

    public function identifierGetId()
    {
        return Text::make(__('backend/fields.id'), 'id')
            ->onlyOnDetail()
            ->readonly();
    }

    public function identifierGetUuid()
    {
        return Text::make(__('backend/fields.uuid'), 'uuid')
            ->onlyOnDetail()
            ->readonly();
    }

    public function identifierGetIdentification()
    {
        return Slug::make(__('backend/fields.identification'), 'identification')
            ->hideWhenCreating()
            ->hideWhenUpdating()
            ->sortable()
            ->readonly();
    }

    public function identifierBarcode()
    {
        return Text::make(__('backend/fields.barcode'), function () {
            return '<a target="_blank" href="'.$this->barcode().'">'.__('backend/fields.show').'</a>';
        })
            ->onlyOnDetail()
            ->asHtml()
            ->readonly();
    }
}
