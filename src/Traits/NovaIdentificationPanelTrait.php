<?php

namespace CodebarAg\LaravelDefaultNova\Traits;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Panel;

trait NovaIdentificationPanelTrait
{
    public function identificationPanel(bool $displayId = true, bool $displayUuid = false, int $limit = 1, array|null $fields = null)
    {
        return (new Panel(trans('default-nova::nova.panels.identification.title'), $this->identification($displayId, $displayUuid, $fields)))->limit($limit);
    }

    protected function identification($displayId, $displayUuid, $fields)
    {
        $values = [];

        if ($displayId) {
            $values[] = $this->getId();
        }

        if ($displayUuid) {
            $values[] = $this->getUuid();
        }

        if ($fields) {
            $values[] = $fields;
        }

        return $values;
    }

    protected function getId()
    {
        return Text::make(trans('default-nova::nova.panels.identification.id'), 'id')
            ->onlyOnDetail()
            ->readonly();
    }

    protected function getUuid()
    {
        return Text::make(trans('default-nova::nova.panels.identification.uuid'), 'uuid')
            ->onlyOnDetail()
            ->readonly();
    }
}
