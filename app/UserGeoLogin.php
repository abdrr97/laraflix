<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGeoLogin extends Model
{
    protected $guarded = []; // YOLO
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
