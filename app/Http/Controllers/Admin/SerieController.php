<?php

namespace App\Http\Controllers\Admin;

use App\Cast;
use App\Episode;
use App\Genre;
use App\Http\Controllers\Controller;
use App\Season;
use App\Serie;
use Illuminate\Http\Request;
use Image;
use Str;

class SerieController extends Controller
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
        $series = Serie::latest()->paginate(10);
        return view('admin.series.index', ['series' => $series]);
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
        return view('admin.series.create', ['genres' => $genres, 'casts' => $casts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trailer_url = Str::contains($request->trailer_url, 'watch?v=')
            ? Str::of($request->trailer_url)->replace('watch?v=', 'embed/')
            : $request->trailer_url;

        $serie = Serie::create([
            'name' => $request->name,
            'publish_date' => $request->publish_date,
            'running_time' => $request->running_time,
            'quality' => $request->quality,
            'description' => $request->description,
            'cover' => $request->hasFile('cover') ? $request->file('cover')->hashName() : null,
            'year' => $request->year,
            'rate' => $request->rate,
            'trailer_url' => $trailer_url,
            'maturity_ratings' => $request->maturity_ratings,
            'is_new' => $request->is_new ? true : false,
            'is_premium' => $request->is_premium ? true : false,
            'is_active' => $request->is_active ? true : false,
        ]);

        $seasons =  $request->input('searie.seasons');
        foreach ($seasons as $season) {
            $s = new Season();
            $s->title =  $season['title'];
            $s->info =  $season['info'];
            $s->publish_date =  $season['publish_date'];

            $serie->seasons()->save($s);

            foreach ($season['episodes'] as $episode) {
                $ep = new Episode();
                $ep->title = $episode['title'];
                $ep->vimeo_url = $episode['vimeo_url'];
                $ep->publish_date = $episode['publish_date'];

                $s->episodes()->save($ep);
            }
        }

        $serie->genres()->sync($request->genres);
        $serie->casts()->sync($request->casts);

        if ($files = $request->file('cover')) {
            $ImageUpload = Image::make($files);
            $originalPath = 'images/';
            $ImageUpload->save($originalPath .  $files->hashName());

            $thumbnailPath = 'thumbnail/';
            $ImageUpload->resize(220, 326);
            $ImageUpload = $ImageUpload->save($thumbnailPath .  $files->hashName());
        }

        return redirect(route('admin.series.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function show(Serie $serie)
    {
        return redirect(route('browse.show_serie', compact('serie')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function edit(Serie $series)
    {
        $genres = Genre::all();
        $casts =  Cast::all();
        return view('admin.series.edit', compact('genres', 'series', 'casts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Serie $serie)
    {
        if (Str::contains($request->trailer_url, 'watch?v=')) {
            $trailer_url = Str::of($request->trailer_url)->replace('watch?v=', 'embed/');
        } else {
            $trailer_url = $request->trailer_url;
        }

        $serie->update([
            'name' => $request->name,
            'publish_date' => $request->publish_date,
            'running_time' => $request->running_time,
            'quality' => $request->quality,
            'description' => $request->description,
            'cover' => $request->hasFile('cover') ? $request->file('cover')->hashName() : $serie->cover,
            'year' => $request->year,
            'rate' => $request->rate,
            'trailer_url' => $trailer_url,
            'maturity_ratings' => $request->maturity_ratings,
            'is_new' => $request->is_new ? true : false,
            'is_premium' => $request->is_premium ? true : false,
            'is_active' => $request->is_active ? true : false
        ]);

        $serie->genres()->detach($serie->genres->pluck('id'));
        $serie->genres()->attach($request->genres);

        $serie->casts()->detach($serie->casts->pluck('id'));
        $serie->casts()->attach($request->casts);

        if ($files = $request->file('cover')) {
            // for save original image
            $ImageUpload = Image::make($files);
            $ImageUpload->save('images/' .  $files->hashName());
            // for save thumnail image
            $ImageUpload->resize(220, 326);
            $ImageUpload = $ImageUpload->save('thumbnail/' .  $files->hashName());
        }

        return redirect(route('admin.series.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serie $serie)
    {
        $serie->delete();

        return redirect(route('admin.series.index'));
    }
}
