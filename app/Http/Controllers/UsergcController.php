<?php

namespace App\Http\Controllers;

use App\Models\Programme1;
use App\Models\Programme2;
use App\Models\Programme3;
use App\Models\Programme4;
use App\Models\Usergc;
use Illuminate\Http\Request;

class UsergcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usergcs = Usergc::all();
        return response()->json($usergcs, 200);
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
     * @param  \App\Models\Usergc  $usergc
     * @return \Illuminate\Http\Response
     */
    public function show(Usergc $usergc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usergc  $usergc
     * @return \Illuminate\Http\Response
     */
    public function edit(Usergc $usergc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usergc  $usergc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usergc $usergc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usergc  $usergc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usergc $usergc)
    {
        //
    }

    public function getP1()
    {
        $programme1s = Programme1::all();
        return response()->json($programme1s, 200);
    }
    public function getP2()
    {
        $programme2s = Programme2::all();
        return response()->json($programme2s, 200);
    }
    public function getP3()
    {
        $programme3s = Programme3::all();
        return response()->json($programme3s, 200);
    }
    public function getP4()
    {
        $programme4s = Programme4::all();
        return response()->json($programme4s, 200);
    }

    public function getcountP1()
    {
        $programme1s = Programme1::count();
        return response()->json($programme1s, 200);
    }

    public function getcountP2()
    {
        $programme2s = Programme2::count();
        return response()->json($programme2s, 200);
    }

    public function getcountP3()
    {
        $programme3s = Programme3::count();
        return response()->json($programme3s, 200);
    }

    public function getcountP4()
    {
        $programme4s = Programme4::count();
        return response()->json($programme4s, 200);
    }
}
