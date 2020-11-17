@extends('layouts.dashboard')

@section('content')
<section class="content patients">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Schools</h2>
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
            @foreach($schools as $school)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card all-patients">
                    <div class="body">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 text-center m-b-0">
                                <a href="javascript:void(0);" class="p-profile-pix"><img src="{{$school->logo}}" alt="user" class="img-thumbnail img-fluid"></a>
                            </div>
                            <div class="col-md-8 col-sm-8 m-b-0">
                                <h5 class="m-b-0">{{$school->name}} 
                                    <a href="{{route('school.edit',$school->id)}}" class="edit"><i class="zmdi zmdi-edit"></i></a>
                                    <form action="{{route('school.destroy',$school->id)}}" method="post" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <a href="{{route('school.destroy',$school->id)}}" class="delete"><i class="zmdi zmdi-delete"></i></a>
                                    </form>
                                </h5> <small>{{$school->code}}</small>
                                <address class="m-b-0">
                                    {{$school->country}} - {{$school->town}}<br>
                                    <abbr title="Phone">Created at :</abbr> {{date('y - m - d'), strtotime($school->created_at)}}
                                </address>
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