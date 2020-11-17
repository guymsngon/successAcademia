@extends('layouts.apps')

@section('content')

<section class="padding-y-100 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mx-auto">
        <div class="card shadow-v2"> 
         <div class="card-header border-bottom">
          <h4 class="mt-4">
            Log In to Your <span class="text-primary"> Account!</span>
          </h4>
         </div>
         @if(session('error'))
            <div class="bg-danger">
                <center>
                  {{session('error')}}
                </center>
            </div>
         @endif         
          <div class="card-body">
            
            <form action="{{route('post_login')}}" method="POST" class="px-lg-4">
            @csrf
              <div class="input-group input-group--focus mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-white ti-user"></span>
                </div>
                <input type="text" name="first_name" class="form-control border-left-0 pl-0" placeholder="Your first name">
              </div>
              <div class="input-group input-group--focus mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-white ti-lock"></span>
                </div>
                <input type="password" name="password" class="form-control border-left-0 pl-0" placeholder="Password">
              </div>
              <div class="d-md-flex justify-content-between my-4">
                <label class="ec-checkbox check-sm my-2 clearfix">
                  <input type="checkbox" name="remember">
                  <span class="ec-checkbox__control"></span>
                  <span class="ec-checkbox__lebel">Remember Me</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-primary my-2 d-block">Forgot password?</a>
              </div>
              <button class="btn btn-block btn-primary">Log In</button>
              <p class="my-5 text-center">
                Don’t have an account? <a href="{{route('register')}}" class="text-primary">Register</a>
              </p>
            </form>
          </div>
        </div>
      </div> 
    </div> <!-- END row-->
  </div> <!-- END container-->
</section>

@endsection