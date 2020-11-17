<?php

namespace App\Http\Controllers;
use App\Course;
use App\Classe;
use App\Post;
use App\ClassCourse;
use App\CourseTeacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $classes = Classe::where('id_school', Auth::user()->id_school)->get();
        return view('pages.index',compact('classes'));
    }
    public function success()
    {
        return view('success');
    }
    public function space_work()
    {   
        if(Auth::user()->role == 'TEA'){
            $courses = Course::where('id_school',Auth::user()->id_school)->get();
            $course_teach = CourseTeacher::where('id_user', Auth::user()->id)->where('id_school',Auth::user()->id_school)->first();
            $classes = Classe::where('id_school', Auth::user()->id_school)->get();
            return view('pages.space_work', compact('courses','course_teach','classes'));
        }else {
            $courses = Course::where('id_school',Auth::user()->id_school)->get();
            $cl = Classe::where('name', Auth::user()->class)->first();
            $course_class = ClassCourse::where('id_class', $cl->id)->where('id_school',Auth::user()->id_school)->first();
            $classes = Classe::where('id_school', Auth::user()->id_school)->get();
            return view('pages.space_work', compact('courses','course_class','classes'));
        }
    }
    public function list_class(Request $request)
    {
        $course = $request->course_give;
        if(Auth::user()->role == 'TEA')
        {
            $classes = ClassCourse::where('id_school', Auth::user()->id_school)->get();
            return view('pages.teacherSpace.list_classe', compact('classes','course'));
        }else {
            $classe = Classe::where('name', Auth::user()->class)->first();
            $posts = Post::where('id_classe', $classe->id)
                        ->where('course', $request->course_give)
                        ->where('id_school', Auth::user()->id_school)->get();
            return view('pages.teacherSpace.post',compact('posts','course','course_teach','id_class'));
        }
    }
}
