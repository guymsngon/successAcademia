@extends('layouts.dashboard')

@section('content')
    <section class="content profile-page">
        <div class="container-fluid">
            <div class="block-header">
                <h2>User Profile</h2>
                <small class="text-muted">Welcome to success Accademia</small>
            </div>  
            @if(session('success'))
                <div class="alert bg-green alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{session('success')}}
                </div>
            @endif
            @if(session('error'))
                <div class="alert bg-red alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{session('error')}}
                </div>
            @endif      
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class=" card patient-profile">
                        <img src="{{asset($user->picture)}}" height= "500" width="350" class="img-fluid" alt="profile picture">                              
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>About {{$user->first_name}}</h2>
                        </div>
                        <hr>
                        <div class="body">
                            <strong>Name</strong>
                            <p>{{$user->first_name}} {{$user->last_name}}</p>
                            <strong>Country</strong>
                            <p>{{$user->country}}</p>
                            <strong>Town</strong>
                            <p>{{$user->town}}</p>
                            <strong>Phone</strong>
                            <p>{{$user->phone_numb}}</p>
                            <hr>
                            <strong>Role</strong>
                            <address>@foreach($roles as $role) @if($user->role == $role->code) {{$role->libelle}} @endif @endforeach</address>
                            <strong>Connection Code</strong>
                            <p>{{$user->code}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection