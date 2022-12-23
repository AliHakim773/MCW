<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Rate::all();
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
            'rating'=>'required',
            'review'=>'required',
            'user_id'=>'required',
            'movie_id'=>'required'

        ]);
        $rate=Rate::where('user_iif($rate!=null){
//           //if this rate already exists ,then we need to update it
//       $this->update($request,$rate->id);
//       }d',$request->userID)->where('movie_id',$request->movie_id)->first();
//
       //if not then this is a new rate, and we create it
               return Rate::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Rate::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rate=Rate::find($id);
        $rate->update($request->all());
        return $rate;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Rate::destroy($id);
    }
}
