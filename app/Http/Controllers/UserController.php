<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\SendMail;
use Illuminate\Mail\Mailable;
use App\Role;
use App\Classe;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classe::where('id_school', Auth::user()->id_school)->get();
        $users = User::all();
        $roles = Role::all();   
        return view('pages.user.index', compact('users','roles','classes'));
    }

    public function class_user_index()
    {
        $students = User::where('role', 'STU')->where('id_school', Auth::user()->id_school)->get();
        $class = Classe::where('id_school', Auth::user()->id_school)->get();
        $classes = Classe::where('id_school', Auth::user()->id_school)->get();
        return view('pages.class_user', compact('students','class','classes'));
    }

    public function class_user(Request $request, $id_user)
    {
        $user = User::findOrFail($id_user);
        $user->class = $request->class;
        try{
            $user->save();
            return back()->withSuccess("User saved.");
        }catch(Exception $e){
            Log::error($e->getMessage());
            return back()->withErrors([
                "message" => "Une erreur est survenue, veuillez réessayer s'il vous plait."
            ]);
        }
    }

    public function supervisor()
    {
        $users = User::where('role', 'SUP')->where('id_school', Auth::user()->id_school)->get();
        $roles = Role::all();   
        $classes = Classe::where('id_school', Auth::user()->id_school)->get();
        return view('pages.user.index', compact('users','roles','classes'));
    }

    public function teachter()
    {
        $users = User::where('role', 'TEA')->where('id_school', Auth::user()->id_school)->get();
        $roles = Role::all();
        $classes = Classe::where('id_school', Auth::user()->id_school)->get();   
        return view('pages.user.index', compact('users','roles','classes'));
    }
    public function student()
    {
        $users = User::where('role', 'STU')->where('id_school', Auth::user()->id_school)->get();
        $roles = Role::all();
        $classes = Classe::where('id_school', Auth::user()->id_school)->get();   
        return view('pages.user.index', compact('users','roles','classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('code','!=','HEAD')->get();
        $classes = Classe::where('id_school', Auth::user()->id_school)->get();
        return view('pages.user.create', compact('roles','classes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->id_school = Auth::user()->id_school;
        if($request->hasFile('picture')){
            $image = $request->file('picture');
            $ext = $image->getClientOriginalExtension();
            $name = time().'.'.$ext;
            $image->move('files/', $name);
            $user->picture = "files/".$name;
        }
        $user->code = random_int(1000 , 9999);
        $send_mail = new SendMail($user->code, $request->first_name);
        Mail::to($request->email)->send($send_mail);
        $user->password = Hash::make($user->code);
        try{
            $user->save();
            return back()->withSuccess("User saved.");
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
        $user = User::findOrFail($id);
        $roles = Role::all();
        $classes = Classe::where('id_school', Auth::user()->id_school)->get();
        return view('pages.user.show', compact('user','roles','classes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::where('code','!=','HEAD')->get();
        $classes = Classe::where('id_school', Auth::user()->id_school)->get();
        return view('pages.user.edit', compact('user', 'roles','classes'));
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
        $user = User::findOrFail($id);
        $user->fill($request->all());
        $user->id_school = Auth::user()->id_school;
        if($request->hasFile('picture')){
            $image = $request->file('picture');
            $ext = $image->getClientOriginalExtension();
            $name = time().'.'.$ext;
            $image->move('files/', $name);
            $user->picture = "files/".$name;
        }
        try{
            $user->save();
            return back()->withSuccess("User updated.");
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
        $user = User::findOrFail($id);
        $user->delete();
        return back()->withSuccess('User deleted');
    }
}
