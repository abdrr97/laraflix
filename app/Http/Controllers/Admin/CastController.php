<?php

namespace App\Http\Controllers\Admin;

use App\Cast;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casts = Cast::paginate(10);
        return view('admin.casts.index')->with('casts', $casts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = Movie::all();

        return view('admin.casts.create', compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cast = Cast::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        $movies_id = $request->movies;
        if ($movies_id)
        {
            $movies = Movie::whereIn('id', $movies_id)->get();
            $cast->movies()->attach($movies);
        }
        return redirect()->route('admin.casts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function show(Cast $cast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function edit(Cast $cast)
    {
        return view('admin.casts.edit', [
            'cast' => $cast
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cast $cast)
    {
        $cast->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect(route('admin.casts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cast $cast)
    {
        $cast->delete();

        return redirect()->route('admin.casts.index');
    }
}
