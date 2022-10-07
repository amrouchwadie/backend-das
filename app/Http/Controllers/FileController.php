<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\FileDoc;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFiles()
    {
        $files = File::all();
        return response()->json($files, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFilesbyId($id)
    {
        $files = File::find($id);
        if (is_null($files)) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        return response()->json(File::find($id), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addFiles(Request $request)
    {
        $files = File::create($request->all());
        return response()->json($files, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function updateFiles(Request $request, $id)
    {
        $files = File::find($id);
        if (is_null($files)) {
            return response()->json(['message' => 'data not found'], 404);
        }
        $files->update($request->all());
        return response()->json($files, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function deleteFiles(Request $request, $id)
    {
        $files = File::find($id);
        if (is_null($files)) {
            return response()->json(['message' => 'data not found'], 404);
        }
        $files->delete();
        return response()->json($files, 204);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function showFileDocbyId(Request $request, $id)
    {
     
        $filedocs = FileDoc::where('file_id', "=", $id)->get();
       
        return response()->json(
           
            $filedocs
        , 200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
