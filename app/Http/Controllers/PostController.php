<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Course;
use App\Comment;
use App\Classe;
use App\CourseTeacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function post_class($id_class)
    {
        $posts = Post::where('id_classe', $id_class)
                    ->where('id_user', Auth::user()->id)
                    ->where('id_school', Auth::user()->id_school)->get();
        return view('pages.teacherSpace.post',compact('posts','courses','course_teach','id_class'));
    }

    public function download_file($id) 
    {
        $post = Post::findOrFail($id);
        if($post->file1 != null)
        {
            $file_path = public_path($post->file1);
            return response()->download($file_path);
        }else{
            return back()->withSuccess("Course Not found at the moment");
        }
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
        $post = new Post();
        if($request->hasFile('file1')){
            $file = $request->file('file1');
            $ext = $file->getClientOriginalExtension();
            $name = time().'.'.$ext;
            $file->move('filesCourse/', $name);
            $post->file1 = "filesCourse/".$name;
        }
        $post->id_school = Auth::user()->id_school;
        $post->id_user = Auth::user()->id;
        $post->id_classe = $request->id_classe;
        $post->course = $request->course;
        $post->title = $request->title;
        $post->content = $request->content;
        try{
            $post->save();
            return redirect()->route('post_class',$request->id_classe);
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
        $post = Post::findOrFail($id);
        $classes = Classe::where('id_school', Auth::user()->id_school)->get();
        $comments = Comment::where('id_post', $id)->get();
        return view('pages.teacherSpace.show', compact('post','classes','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
