<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CountryStateCity extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function countryShow()
    {
        //
        $getCountry = DB::table('country')->get();
        return view('index',compact('getCountry'));

    }

    public function stateShow(Request $request)
    {
        //
        $getState = DB::table('state')
                    ->where('country_id','=',$request->id)
                    ->get();
        return response()->json($getState);
    }
    public function showCity(Request $request)
    {
        //
        $getCity = DB::table('cities')
                    ->where('state_id','=',$request->id)
                    ->get();
        return response()->json($getCity);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
