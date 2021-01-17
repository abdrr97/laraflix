<?php

namespace App;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Cast extends Model implements Searchable
{
    protected $fillable = ['name', 'description'];

    public function movies()
    {
        return $this->belongsToMany(Movie::class)->withTimestamps();
    }

    public function series()
    {
        return $this->belongsToMany(Serie::class)->withTimestamps();
    }
    public function getSearchResult(): SearchResult
    {
        return new SearchResult(
            $this,
            $this->name,
        );
    }
}
