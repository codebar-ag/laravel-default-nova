<?php

namespace CodebarAg\LaravelDefaultNova\Traits;

use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Panel;

trait NovaTimestampsPanelTrait
{
    public function timestampsPanel($displayCreatedAt = true, $displayUpdatedAt = true, $displayDeletedAt = true, $limit = 1)
    {
        return (new Panel(trans('default-nova::nova.panels.timestamps.title'), $this->timestamps($displayCreatedAt, $displayUpdatedAt, $displayDeletedAt)))->limit($limit);
    }

    protected function timestamps($displayCreatedAt, $displayUpdatedAt, $displayDeletedAt)
    {
        $values = [];

        if ($displayCreatedAt) {
            $values[] = $this->timestampsGetCreatedAt();
        }

        if ($displayUpdatedAt) {
            $values[] = $this->timestampsGetUpdatedAt();
        }

        if ($displayDeletedAt) {
            $values[] = $this->timestampsGetDeletedAt();
        }

        return $values;
    }

    protected function timestampsGetCreatedAt()
    {
        return DateTime::make(trans('default-nova::nova.panels.timestamps.created_at'), 'created_at')
            ->onlyOnDetail()
            ->readonly();
    }

    protected function timestampsGetUpdatedAt()
    {
        return DateTime::make(trans('default-nova::nova.panels.timestamps.updated_at'), 'updated_at')
            ->onlyOnDetail()
            ->readonly();
    }

    protected function timestampsGetDeletedAt()
    {
        return DateTime::make(trans('default-nova::nova.panels.timestamps.deleted_at'), 'deleted_at')
            ->onlyOnDetail()
            ->readonly();
    }
}
