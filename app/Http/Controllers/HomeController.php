<?php

namespace App\Http\Controllers;

use App\Cast;
use App\Genre;
use App\Movie;
use App\Page;
use App\Serie;
use Request;
use Spatie\Searchable\Search;

class HomeController extends Controller
{
    public function index()
    {
        $featured = Movie::take(10)
            ->where('is_active', 1)
            ->where('publish_date', '<=', now('Africa/Casablanca'))
            ->where('rate', '>=', '3')
            ->latest()
            ->get()
            ->shuffle();
        $series = Serie::where('is_active', 1)
            ->where('publish_date', '<=', now('Africa/Casablanca'))
            ->get();
        $series->load('seasons');
        $movies = Movie::where('is_active', 1)
            ->where('publish_date', '<=', now('Africa/Casablanca'))
            ->latest()
            ->get();
        $main = collect([$movies, $series])->collapse()->lazy()->all();
        $quality = [
            'HD',
            'FULL HD',
            '4K'
        ];
        return view('frontend.browse')
            ->with('featured', $featured)
            ->with('quality', $quality)
            ->with('main', $main);
    }

    public function show($id)
    {
        $movie = Movie::find($id);
        $serie = Serie::find($id);
        if (!empty($movie)) {
            $movie->is_active && $movie->publish_date > now('Africa/Casablanca') ? abort(404) : null;
            return view('frontend.movie.movie_details')->with('movie', $movie);
        }

        if (!empty($serie)) {
            $serie->is_active && $serie->publish_date > now('Africa/Casablanca') ? abort(404) : null;
            $season = request('season');
            $episode = request('episode');
            $first_season = $serie->seasons()->first()->episodes()->first();
            $selected_season = !empty($season) && !empty($episode)
                ? $serie
                ->seasons()
                ->where('id', $season)
                ->where('publish_date', '<=', now('Africa/Casablanca'))
                ->first()
                ->episodes()
                ->where('id', $episode)
                ->where('publish_date', '<=', now('Africa/Casablanca'))
                ->first()
                : $first_season;
            return view('frontend.movie.serie_details')
                ->with('serie', $serie)
                ->with('s', $season)
                ->with('e', $episode)
                ->with('vimeo_url', $selected_season->vimeo_url ?? '');
        }
    }

    public function movie_genres(Genre $genre)
    {
        $params = [
            'genre' => $genre,
            'movies' => $genre->movies()->where('is_active', 1)
                ->where('publish_date', '<=', now('Africa/Casablanca'))
                ->get(),
        ];
        return view('frontend.movie_by_genre', $params);
    }

    public function movie_casts(Cast $cast)
    {
        $params = [
            'cast' => $cast,
            'movies' => $cast->movies()
                ->where('is_active', 1)
                ->where('publish_date', '<=', now('Africa/Casablanca'))
                ->get(),
        ];
        return view('frontend.movie_by_cast', $params);
    }

    public function movies()
    {
        $filmx = Movie::where('is_active', 1)
            ->where('publish_date', '<=', now('Africa/Casablanca'))
            ->latest()
            ->paginate(10);

        $current_page = 'movies';
        return view('frontend.movie.movies_series', compact('filmx', 'current_page'));
    }

    public function series()
    {
        $filmx = Serie::where('is_active', 1)
            ->where('publish_date', '<=', now('Africa/Casablanca'))
            ->latest()
            ->paginate(10);
        $current_page = 'series';
        return view('frontend.movie.movies_series', compact('filmx', 'current_page'));
    }

    public function latest()
    {
        $series = Serie::take(10)
            ->where('is_active', 1)
            ->where('publish_date', '<=', now('Africa/Casablanca'))
            ->latest()
            ->get();
        $movies = Movie::take(10)
            ->where('is_active', 1)
            ->where('publish_date', '<=', now('Africa/Casablanca'))
            ->latest()
            ->get();
        $current_page = 'latest';

        $filmx = collect([$movies, $series])->collapse()->sortBy('is_new', null, true);
        return view('frontend.movie.movies_series', compact('filmx', 'current_page'));
    }

    public function legal($type)
    {
        $pages = Page::where('type', $type)->first();
        return view('frontend.legal.legal', ['page' => $pages]);
    }
    public function search()
    {
        $current_page = 'Search';
        $filmx = (new Search())
            ->registerModel(Movie::class, ['name'])
            ->registerModel(Serie::class, ['name'])
            ->registerModel(Cast::class, ['name'])
            ->registerModel(Genre::class, ['name'])
            ->perform(request()->input('q'));

        return view('frontend.movie.search', compact('filmx', 'current_page'));
    }
}
