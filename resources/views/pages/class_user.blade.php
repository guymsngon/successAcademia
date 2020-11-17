@extends('layouts.dashboard')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Assign Class of Student</h2>
            <small class="text-muted">Welcome to success Accademia</small>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <P>Select the Student that you want to edit classe</P>
            </div>
        </div>
        <hr>
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
                <div class="card">
                    <div class="header">
                        <h2>List of Students</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NAME</th>
                                        <th>CLASSE</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    <tr>
                                        <td>{{$student->id}}</td>
                                        <td class="txt-oflo">{{$student->first_name}} {{$student->last_name}}</td>
                                        <td class="txt-oflo">{{$student->class}}</td>
                                        <td>
                                            <a id="{{$student->id}}" data-toggle="modal" data-target="#largeModal{{$student->id}}" href="#"><button type="button" class="btn cbtn-raised btn-warning waves-effect"> <i class="material-icons">create</i> </button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
        <!-- #END# Example -->
    </div>
</section>
<!-- Edit Modal  -->
@foreach($students as $student)
<div class="modal fade" id="largeModal{{$student->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <form action="{{route('class_user', $student->id)}}" method="post">
        @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Assign Class Students</h4>
                </div>
                <div class="modal-body"> 
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="form-line">
                                <label for="">List of Class</label>
                                    <select name="class" id="" class="form-control">
                                        @foreach($class as $course)
                                            <option value="{{$course->name}}">{{$course->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect">SAVE</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
<!-- End Edit Modal  -->

@endsection