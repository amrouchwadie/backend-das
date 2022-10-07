<?php

namespace App\Http\Controllers;

use App\Models\Validate;
use Illuminate\Http\Request;

class ValidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getValidate()
    {
        $validates = Validate::all();
        return response()->json($validates, 200);
    }

    public function getValidateById($id)
    {
        $validates = Validate::find($id);
        if (is_null($validates)) {
            return response()->json(['message' => 'Validate not found'], 404);
        }
        return response()->json(Validate::find($id), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addValidate(Request $request)
    {
        $validates = Validate::create($request->all());
        return response()->json($validates, 201);
    }

    public function updateValidate(Request $request, $id)
    {
        $validates = Validate::find($id);
        if (is_null($validates)) {
            return response()->json(['message' => 'Validate not found'], 404);
        }
        $validates->update($request->all());
        return response()->json($validates, 200);
    }

    public function deleteValidate(Request $request, $id)
    {
        $validates = Validate::find($id);
        if (is_null($validates)) {
            return response()->json(['message' => 'Validate not found'], 404);
        }
        $validates->delete();
        return response()->json($validates, 204);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
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
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Validate  $validate
     * @return \Illuminate\Http\Response
     */
    public function show(Validate $validate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Validate  $validate
     * @return \Illuminate\Http\Response
     */
    public function edit(Validate $validate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Validate  $validate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Validate $validate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Validate  $validate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Validate $validate)
    {
        //
    }
}
