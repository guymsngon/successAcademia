<?php

namespace App\Http\Controllers;

use App\Establishment;
use App\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstablishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classe::where('id_school', Auth::user()->id_school)->get();
        if(Auth::user()->role == 'ADM')
        {
            $schools = Establishment::all();
            return view('pages.school.index', compact('schools','classes'));
        }else {
            $schools = Establishment::where('id_user', Auth::user()->id)->get();
            return view('pages.school.index', compact('schools','classes'));
        }
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::where('id_school', Auth::user()->id_school)->get();
        return view('pages.school.create',compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $school = new Establishment();
        $user = Auth::user();
        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $ext = $image->getClientOriginalExtension();
            $name = time().'.'.$ext;
            $image->move('files/', $name);
            $school->logo = "files/".$name;
        }
        $school->name = $request->name;
        $school->code = $request->code;
        $school->description = $request->description;
        $school->town = $request->town;
        $school->country = $request->country;
        $school->id_user = $user->id;
        try{
            $school->save();
            $user->id_school = $school->id;
            $user->save();
            return redirect()->route('home');
        }catch(Exception $e){
            Log::error($e->getMessage());
            return back()->with([
                "error" => "Une erreur est survenu veuillez reéssayer plus tard"
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classes = Classe::where('id_school', Auth::user()->id_school)->get();
        $school = Establishment::findOrFail($id);
        return view('school.show', compact('school','classes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school = Establishment::findOrFail($id);
        $classes = Classe::where('id_school', Auth::user()->id_school)->get();
        return view('pages.school.edit', compact('school','classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $school = Establishment::findOrFail($id);
        $user = Auth::user();
        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $ext = $image->getClientOriginalExtension();
            $name = time().'.'.$ext;
            $image->move('files/', $name);
            $school->logo = "files/".$name;
        }
        $school->name = $request->name;
        $school->code = $request->code;
        $school->description = $request->description;
        $school->town = $request->town;
        $school->country = $request->country;
        $school->id_user = $user->id;
        try{
            $school->save();
            $user->id_school = $school->id;
            $user->save();
            return redirect()->route('school.index')->with([
                "success" => "Update is success"
            ]);
        }catch(Exception $e){
            Log::error($e->getMessage());
            return back()->with([
                "error" => "Une erreur est survenu veuillez reéssayer plus tard"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school = Establishment::findOrFail($id);
        $school->delete();
        return back()->withSuccess("Establishment deleted");
    }
}
