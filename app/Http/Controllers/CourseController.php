<?php

namespace App\Http\Controllers;

use App\Course;
use App\Classe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::where('id_school', Auth::user()->id_school)->get();
        $classes = Classe::where('id_school', Auth::user()->id_school)->get();
        return view('pages.course.index', compact('courses','classes'));
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
        $course = new Course();
        $course->fill($request->all());
        $course->id_school = Auth::user()->id_school;
        try{
            $course->save();
            return back()->withSuccess("Course saved.");
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
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
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
        $course = Course::findOrFail($id);
        $course->fill($request->all());
        $course->id_school = Auth::user()->id_school;
        try{
            $course->save();
            return back()->withSuccess("Course saved.");
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
        $course = Course::findOrFail($id);
        $course->delete();
        return back()->withSuccess('Course deleted');
    }
}
