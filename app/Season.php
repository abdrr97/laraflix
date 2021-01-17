<?php

namespace App;

class Season extends Model
{
    protected $fillable = ['title', 'info', 'publish_date'];

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
}
