<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($setting) {
            cache()->forget('settings');
        });

        static::updated(function ($setting) {
            cache()->forget('settings');
        });
    }
}
