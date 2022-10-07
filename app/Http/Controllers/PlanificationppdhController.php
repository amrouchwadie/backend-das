<?php

namespace App\Http\Controllers;

use App\Models\Planificationppdh;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PlanificationppdhImport;

class PlanificationppdhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPlanificationppdh()
    {
        $Planificationppdhs = Planificationppdh::all();
        return response()->json($Planificationppdhs, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPlanificationppdhById($id)
    {
        $Planificationppdhs = Planificationppdh::find($id);
        if (is_null($Planificationppdhs)) {
            return response()->json(['message' => 'Planification PPDH not found'], 404);
        }
        return response()->json(Planificationppdh::find($id), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addPlanificationppdh(Request $request)
    {
        $Planificationppdhs = Planificationppdh::create($request->all());
        return response()->json($Planificationppdhs, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Planificationppdh  $planificationppdh
     * @return \Illuminate\Http\Response
     */
    public function show(Planificationppdh $planificationppdh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Planificationppdh  $planificationppdh
     * @return \Illuminate\Http\Response
     */
    public function edit(Planificationppdh $planificationppdh)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Planificationppdh  $planificationppdh
     * @return \Illuminate\Http\Response
     */
    public function updatePlanificationppdh(Request $request, $id)
    {
        $Planificationppdhs = Planificationppdh::find($id);
        if (is_null($Planificationppdhs)) {
            return response()->json(['message' => 'Planification ppdhs not found'], 404);
        }
        $Planificationppdhs->update($request->all());
        return response()->json($Planificationppdhs, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Planificationppdh  $planificationppdh
     * @return \Illuminate\Http\Response
     */
    public function deletePlanificationppdh(Request $request, $id)
    {
        $Planificationppdhs = Planificationppdh::find($id);
        if (is_null($Planificationppdhs)) {
            return response()->json(['message' => 'Planificationppdhs not found'], 404);
        }
        $Planificationppdhs->delete();
        return response()->json($Planificationppdhs, 204);
    }

    public function rechercheAnn(Request $request)
    {
        $query = Planificationppdh::query();
        $data = $request->input('search_ann');
        if ($data) {
            $query->whereRaw("annee LIKE '%" . $data . "%'");
        }
        return $query->get();
    }

    public function rechercheProg(Request $request)
    {
        $query = Planificationppdh::query();
        $data = $request->input('search_program');
        if ($data) {
            $query->whereRaw("programme LIKE '%" . $data . "%'");
        }
        return $query->get();
    }
    public function import() 
    {
        $imports = Excel::import(new PlanificationppdhImport,request()->file('file'));
        return response()->back()->json($imports, 200);
    }
    
    public function upload(Request $request)
{
    dd($request->all()); // Shows as [ "formData" => [] ]

    $file = $request->file('file');
    dd($file); // Shows as null
}
}
