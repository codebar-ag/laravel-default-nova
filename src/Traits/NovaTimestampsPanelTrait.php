<?php

namespace CodebarAg\LaravelDefaultNova\Traits;

use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Panel;

trait NovaTimestampsPanelTrait
{
    public function timestampsPanel($displayCreatedAt = true, $displayUpdatedAt = true, $displayDeletedAt = true, $limit = 1)
    {
        return (new Panel(__('backend/panels.timestamps'), $this->timestamps($displayCreatedAt, $displayUpdatedAt, $displayDeletedAt)))->limit($limit);
    }

    public function timestamps($displayCreatedAt, $displayUpdatedAt, $displayDeletedAt)
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

    public function timestampsGetCreatedAt()
    {
        return DateTime::make(__('backend/fields.created_at'), 'created_at')
            ->onlyOnDetail()
            ->readonly();
    }

    public function timestampsGetUpdatedAt()
    {
        return DateTime::make(__('backend/fields.updated_at'), 'updated_at')
            ->onlyOnDetail()
            ->readonly();
    }

    public function timestampsGetDeletedAt()
    {
        return DateTime::make(__('backend/fields.deleted_at'), 'deleted_at')
            ->onlyOnDetail()
            ->readonly();
    }
}
