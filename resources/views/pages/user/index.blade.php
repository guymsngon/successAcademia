@extends('layouts.dashboard')

@section('content')
<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Users</h2>
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
        <div class="row">
            <div class="col-lg-6">
                <a href="{{route('users.create')}}" class="btn btn-raised g-bg-cyan">Add User</a>
            </div>
        </div>
        <br>
        <div class="row clearfix">
            @foreach($users as $user)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="body">
                        <div class="member-card verified">                            
                            <div class="thumb-xl member-thumb">
                                <img src="{{$user->picture}}" class="img-thumbnail rounded-circle" alt="profile-image">                               
                            </div>
                            <div class="">
                                <h4 class="m-b-5 m-t-20">{{$user->first_name}} {{$user->last_name}}</h4>
                                <p class="text-muted"> @foreach($roles as $role) @if($user->role == $role->code) {{$role->libelle}} @endif @endforeach </p>
                            </div>
                            <p>Created at</p>
                            <p class="text-muted">{{date('y - m - d'), strtotime($user->created_at)}}</p>
                            <div class="icon-button-demo">                           
                                <a href="{{route('users.show', $user->id)}}"><button type="button" class="btn cbtn-raised btn-primary waves-effect"> <i class="material-icons">visibility</i> </button></a>
                                <a href="{{route('users.edit', $user->id)}}"><button type="button" class="btn cbtn-raised btn-warning waves-effect"> <i class="material-icons">create</i> </button></a>
                                <form action="{{route('users.destroy', $user->id)}}" method="post" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn cbtn-raised btn-danger waves-effect"> <i class="material-icons">delete</i> </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection