<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model as BaseModel;

/**
 * App\Model
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model query()
 * @mixin \Eloquent
 */
class Model extends BaseModel
{
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()}  = (string) Str::uuid();
        });
    }
}
