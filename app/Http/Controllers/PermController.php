<?php

namespace App\Http\Controllers;

use App\Models\perm;
use Illuminate\Http\Request;

class PermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perms = perm::all();
        return response()->json($perms, 200);
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
     * @param  \App\Models\perm  $perm
     * @return \Illuminate\Http\Response
     */
    public function show(perm $perm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\perm  $perm
     * @return \Illuminate\Http\Response
     */
    public function edit(perm $perm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\perm  $perm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, perm $perm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\perm  $perm
     * @return \Illuminate\Http\Response
     */
    public function destroy(perm $perm)
    {
        //
    }
}
