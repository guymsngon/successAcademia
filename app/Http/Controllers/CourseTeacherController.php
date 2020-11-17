<?php

namespace App\Http\Controllers;

use App\CourseTeacher;
use App\Course;
use App\User;
use App\Classe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CourseTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $courses = Course::where('id_school', Auth::user()->id_school)->get();
        $course_teachs = CourseTeacher::where('id_school', Auth::user()->id_school)->get();
        $teachers = User::where('id_school', Auth::user()->id_school)->where('role','=','TEA')->get();
        $classes = Classe::where('id_school', Auth::user()->id_school)->get();
        return view('pages.teacher_course.index', compact('courses','teachers','course_teachs','classes'));
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
        
        if(count(CourseTeacher::where('id_user', $request->id_user)->get()) == 0){
            $course_teach = new  CourseTeacher();
            $course_teach->id_school = Auth::user()->id_school;
            $course_teach->id_user = $request->id_user;
            $course_teach->list_course = implode(' - ', $request->list_course);
            try{
                $course_teach->save();
                return back()->withSuccess("Operation saved.");
            }catch(Exception $e){
                Log::error($e->getMessage());
                return back()->withErrors([
                    "message" => "Une erreur est survenue, veuillez réessayer s'il vous plait."
                ]);
            }
        }else{
            $c = CourseTeacher::where('id_user', $request->id_user)->first();
            $ct = CourseTeacher::findOrFail($c->id);
            $ct->id_school = Auth::user()->id_school;
            $ct->id_user = $request->id_user;
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
