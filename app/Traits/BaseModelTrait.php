<?php

namespace App\Traits;
use Illuminate\Database\Eloquent\Builder;

trait BaseModelTrait
{
    public function getUidAttribute()
    {
        return encodeId($this->id);
    }

    public function scopeActive(Builder $query) {
        $query->where('status', 1);
    }

}
