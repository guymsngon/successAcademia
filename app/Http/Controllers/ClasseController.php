<?php

namespace App\Http\Controllers;

use App\Classe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classe::where('id_school', Auth::user()->id_school)->get();
        return view('pages.classe.index', compact('classes'));
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
        $classe = new Classe();
        $classe->fill($request->all());
        $classe->name = $request->branche." ".$request->level;
        $classe->id_school = Auth::user()->id_school;
        try{
            $classe->save();
            return back()->withSuccess("Classe saved.");
        }catch(Exception $e){
            Log::error($e->getMessage());
            return back()->withErrors([
                "message" => "Une erreur est survenue, veuillez réessayer s'il vous plait."
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classe = Classe::findOrFail($id);
        $classes = Classe::where('id_school', Auth::user()->id_school)->get();
        return view('pages.classe.show',compact('classes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function edit(Classe $classe)
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
        $classe = Classe::findOrFail($id);
        $classe->name = $request->branche.' '.$request->level;
        $classe->fill($request->all());
        $classe->id_school = Auth::user()->id_school;
        try{
            $classe->save();
            return back()->withSuccess("Classe Update.");
        }catch(Exception $e){
            Log::error($e->getMessage());
            return back()->withErrors([
                "message" => "Une erreur est survenue, veuillez réessayer s'il vous plait."
            ]);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $classe = Classe::findOrFail($request->classe);
        if($request->hasFile('file')){
            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
            $name = $classe->name.'timeTable'.'.'.$ext;
            $file->move('timeTable/', $name);
            $classe->time_table = "timeTable/".$name;
        }
        try{
            $classe->save();
            return back()->withSuccess("Classe Time Table Upload");
        }catch(Exception $e){
            Log::error($e->getMessage());
            return back()->withErrors([
                "message" => "Une erreur est survenue, veuillez réessayer s'il vous plait."
            ]);
        }
    }


    public function download($class) 
    {
        $classe = Classe::where('name',$class)->first();
        if($classe->time_table != null)
        {
            $file_path = public_path($classe->time_table);
            return response()->download($file_path);
        }else{
            return back()->withSuccess("Time Table Not found at the moment");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classe = Classe::findOrFail($id);
        $classe->delete();
        return back()->withSuccess('Classe deleted');
    }
}
