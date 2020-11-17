<?php

namespace App\Http\Controllers;

use App\Branche;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BrancheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branche::where('id_school', Auth::user()->id_school)->get();
        $classes = Classe::where('id_school', Auth::user()->id_school)->get();
        return view('pages.branche.index', compact('branches','classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::where('id_school', Auth::user()->id_school)->get();
        return view('pages.branche.create',compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branche = new Branche();
        $branche->fill($request->all());
        $branche->id_school = Auth::user()->id_school;
        try{
            $branche->save();
            return back()->withSuccess("Branche saved.");
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
        $branche = Branche::findOrFail($id);
        $classes = Classe::where('id_school', Auth::user()->id_school)->get();
        return view ('pages.branche.show',compact('classes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branche = Branche::findOrFail($id);
        $classes = Classe::where('id_school', Auth::user()->id_school)->get();
        return view ('pages.branche.edit',compact('classes'));   
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
        $branche = Branche::findOrFail($id);
        $branche->fill($request->all());
        $branche->id_school = Auth::user()->id_school;
        try{
            $branche->save();
            return back()->withSuccess("Branche Updated.");
        }catch(Exception $e){
            Log::error($e->getMessage());
            return back()->withErrors([
                "message" => "Une erreur est survenue, veuillez réessayer s'il vous plait."
            ]);
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
        $branche = Branche::findOrFail($id);
        $branche->delete();
        return back()->withSuccess('Branche deleted');
    }
}
