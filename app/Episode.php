<?php

namespace App;

class Episode extends Model
{
    protected $guarded = [];

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
