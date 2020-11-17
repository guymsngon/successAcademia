<?php

namespace App\Http\Controllers;

use App\ClassCourse;
use App\Course;
use App\Classe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClassCourseController extends Controller
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
        $class_course = ClassCourse::where('id_school', Auth::user()->id_school)->get();
        return view('pages.class_course.index', compact('courses','class_course','classes'));
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
        if(count(ClassCourse::where('id_class', $request->id_class)->get()) == 0){
            $class_course = new  ClassCourse();
            $class_course->id_school = Auth::user()->id_school;
            $class_course->id_class = $request->id_class;
            $class_course->list_course = implode(' - ', $request->list_course);
            try{
                $class_course->save();
                return back()->withSuccess("Operation saved.");
            }catch(Exception $e){
                Log::error($e->getMessage());
                return back()->withErrors([
                    "message" => "Une erreur est survenue, veuillez réessayer s'il vous plait."
                ]);
            }
        }else{
            $c = ClassCourse::where('id_class', $request->id_class)->first();
            $ct = ClassCourse::findOrFail($c->id);
            $ct->id_school = Auth::user()->id_school;
            $ct->id_class = $request->id_class;
            $ct->list_course = implode(' - ', $request->list_course);
            try{
                $ct->save();
                return back()->withSuccess("Operation saved.");
            }catch(Exception $e){
                Log::error($e->getMessage());
                return back()->withErrors([
                    "message" => "Une erreur est survenue, veuillez réessayer s'il vous plait."
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassCourse  $classCourse
     * @return \Illuminate\Http\Response
     */
    public function show(ClassCourse $classCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassCourse  $classCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassCourse $classCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassCourse  $classCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassCourse $classCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassCourse  $classCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassCourse $classCourse)
    {
        //
    }
}
