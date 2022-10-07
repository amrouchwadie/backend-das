<?php

namespace App\Http\Controllers;

use App\Models\Douar;
use App\Models\Commun;
use Illuminate\Http\Request;

class DouarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getdouar()
    {
        $douars = Douar::all();
        $communs = Commun::all();
        return response()->json([
            'douars'=> $douars,
            'communs'=> $communs]
            , 200);
    }


    public function getdouarById($id)
    {
        $communs = Commun::all();
        $douars = Douar::find($id);
        if (is_null($communs)) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        return response()->json([
            Douar::find($id),
            $communs
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function adddouar(Request $request)
    {
        $douars = Douar::create($request->all());
        return response()->json($douars, 201);
    }

    public function updatedouar(Request $request, $id)
    {
        $douars = Douar::find($id);
        if (is_null($douars)) {
            return response()->json(['message' => 'data not found'], 404);
        }
        $douars->update($request->all());
        return response()->json($douars, 200);
    }

    public function deletecommun(Request $request, $id)
    {
        $douars = Douar::find($id);
        if (is_null($douars)) {
            return response()->json(['message' => 'data not found'], 404);
        }
        $douars->delete();
        return response()->json($douars, 204);
    }



    public function create()
    {
        
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
     * @param  \App\Models\Douar  $douar
     * @return \Illuminate\Http\Response
     */
    public function show(Douar $douar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Douar  $douar
     * @return \Illuminate\Http\Response
     */
    public function edit(Douar $douar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Douar  $douar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Douar $douar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Douar  $douar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Douar $douar)
    {
        //
    }
}
