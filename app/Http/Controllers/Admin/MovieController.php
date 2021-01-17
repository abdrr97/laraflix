<?php

namespace App\Http\Controllers\Admin;

use App\Cast;
use Image;
use App\Genre;
use App\Movie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::latest()->paginate(10);
        return view('admin.movies.index', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres =  Genre::where('status', 1)->get();
        $casts =  Cast::all();
        return view('admin.movies.create', ['genres' => $genres, 'casts' => $casts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Str::contains($request->trailer_url, 'watch?v=')) {
            $trailer_url = Str::of($request->trailer_url)->replace('watch?v=', 'embed/');
        } else {
            $trailer_url = $request->trailer_url;
        }

        $movie = Movie::create([
            'name' => $request->name,
            'publish_date' => $request->publish_date,
            'running_time' => $request->running_time,
            'quality' => $request->quality,
            'description' => $request->description,
            'cover' => $request->hasFile('cover') ? $request->file('cover')->hashName() : null,
            'year' => $request->year,
            'rate' => $request->rate,
            'trailer_url' => $trailer_url,
            'vimeo_url' => $request->vimeo_url,
            'maturity_ratings' => $request->maturity_ratings,
            'is_new' => $request->is_new ? true : false,
            'is_premium' => $request->is_premium ? true : false,
            'is_active' => $request->is_active ? true : false
        ]);

        $movie->genres()->attach($request->genres);
        $movie->casts()->attach($request->casts);

        if ($files = $request->file('cover')) {
            // for save original image
            $ImageUpload = Image::make($files);
            $originalPath = 'images/';
            $ImageUpload->save($originalPath .  $files->hashName());

            // for save thumnail image
            $thumbnailPath = 'thumbnail/';
            $ImageUpload->resize(220, 326);
            $ImageUpload = $ImageUpload->save($thumbnailPath .  $files->hashName());
        }

        return redirect(route('admin.movies.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return redirect(route('browse.show_movie', compact('movie')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        $casts =  Cast::all();
        return view('admin.movies.edit', compact('genres', 'movie', 'casts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        if (Str::contains($request->trailer_url, 'watch?v=')) {
            $trailer_url = Str::of($request->trailer_url)->replace('watch?v=', 'embed/');
        } else {
            $trailer_url = $request->trailer_url;
        }

        $movie->update([
            'name' => $request->name,
            'publish_date' => $request->publish_date,
            'running_time' => $request->running_time,
            'quality' => $request->quality,
            'description' => $request->description,
            'cover' => $request->hasFile('cover') ? $request->file('cover')->hashName() : $movie->cover,
            'year' => $request->year,
            'rate' => $request->rate,
            'trailer_url' => $trailer_url,
            'vimeo_url' => $request->vimeo_url,
            'maturity_ratings' => $request->maturity_ratings,
            'is_new' => $request->is_new ? true : false,
            'is_premium' => $request->is_premium ? true : false,
            'is_active' => $request->is_active ? true : false
        ]);

        $movie->genres()->detach($movie->genres->pluck('id'));
        $movie->genres()->attach($request->genres);

        $movie->casts()->detach($movie->casts->pluck('id'));
        $movie->casts()->attach($request->casts);

        if ($files = $request->file('cover')) {
            // for save original image
            $ImageUpload = Image::make($files);
            $ImageUpload->save('images/' .  $files->hashName());
            // for save thumnail image
            $ImageUpload->resize(220, 326);
            $ImageUpload = $ImageUpload->save('thumbnail/' .  $files->hashName());
        }

        return redirect(route('admin.movies.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect(route('admin.movies.index'));
    }
}
