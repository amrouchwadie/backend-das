<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\FileDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class FileDocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFileDocs()
    {
       
        $filesdocs = FileDoc::all();
        return response()->json($filesdocs, 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFileDocsbyId($id)
    {
       
        $filesdocs = FileDoc::find($id);
        if (is_null($filesdocs)) {
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
    public function addFileDocs(Request $request)
    {

        $filesdocs = new FileDoc();
        if (!$request->hasFile('file') && !$request->file('file')) {
            return response()->json('{"error":"Please provide file}');
        }
        try {
            $filename = $request->file('file')->hashName();
            Storage::disk('local')->put($filename, file_get_contents($request->file('file')));
            $filesdocs->file = $filename;
            $filesdocs->name = $request->name;
            $filesdocs->file_id = $request->file_id;
            $filesdocs->save();
            return response()->json($filesdocs);
        } catch (\Exception $e) {
            return response()->json($e);
        }
        



        // $data = new FileDoc();
         
      
        // $file = $request->file('file');
        // $name = $file->getClientOriginalName();
        // $file->move(public_path() . '/files/', $name);
        // $data->file = $name;
        // $data->name = $request->name;
        // $data->file_id = $request->file_id;
        // $data->save();

        // return response()->json($data, 200);

        // $filedocs = new FileDoc();
        // if ($request->hasFile('file')) {
        //     $completeFileName = $request->file('file')->getClientOriginalName();
        //     $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
        //     $extenshion = $request->file('file')->getClientOriginalName();
        //     $compPic = str_replace('','_',$fileNameOnly).'-'.rand().'_'.time().'.'.
        //     $extenshion;
        //     $path = $request->file('file')->storeAs('public/files',$compPic);
        //     $filedocs->file = $compPic;
        //     $filedocs->name = $request->name;
        //     $filedocs->file_id = $request->file_id;
        // }
        // if ($filedocs->save()) {
        //     return ['status'=> true , 'message'=>"success"];
        // }else{
        //     return ['status'=> false , 'message'=>"erreur"];
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileDoc  $fileDoc
     * @return \Illuminate\Http\Response
     */
    public function show(FileDoc $fileDoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileDoc  $fileDoc
     * @return \Illuminate\Http\Response
     */
    public function edit(FileDoc $fileDoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FileDoc  $fileDoc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileDoc $fileDoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileDoc  $fileDoc
     * @return \Illuminate\Http\Response
     */
    public function destroy(FileDoc $fileDoc)
    {
        //
    }
}
