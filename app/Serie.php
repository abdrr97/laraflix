<?php

namespace App;

use Laravelista\Comments\Commentable;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Serie extends Model implements Searchable
{
    use Commentable;
    protected $guarded = [];

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class)
            ->withTimestamps();
    }

    public function casts()
    {
        return $this->belongsToMany(Cast::class)->withTimestamps();
    }

    public function getSearchResult(): SearchResult
    {
        return new SearchResult(
            $this,
            $this->name,
        );
    }
}
