<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Rate;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Movie::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'movie_name'=>'required',
            'poster_url'=>'required',
            'rating'=>'required',
            'synopsis'=>'required',
            'genre_id '=>'selecting genre is required'

        ]);
        Movie::create($request->all());
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Movie::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $movie = Movie::find($id);

         $movie->update($request->all());
        return $request;

    }
    public function getAvgRating($id)
    {
        $averageRating = Rate::where('movie_id', $id)
            ->avg('rating');

        return $averageRating;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return  Movie::destroy($id);
    }
}

