@extends('layouts.dashboard')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Assign Courses of Class</h2>
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
            <div class="col-lg-9">
                <P>Select the Class that you want to edit list of course</P>
            </div>
        </div>
        <hr>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>List of Class</h2>
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
                                        <th>LIST OF COURSE</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($classes as $classe)
                                    <tr>
                                        <td>{{$classe->id}}</td>
                                        <td class="txt-oflo">{{$classe->name}}</td>
                                        <td class="txt-oflo">@foreach($class_course as $ct) @if($ct->id_class == $classe->id)  {{$ct->list_course}} @endif @endforeach</td>
                                        <td>
                                            <a id="{{$classe->id}}" data-toggle="modal" data-target="#largeModal1{{$classe->id}}" href="{{route('class_courses.edit', $classe->id)}}"><button type="button" class="btn cbtn-raised btn-warning waves-effect"> <i class="material-icons">create</i> </button></a>
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
@foreach($classes as $classe)
<div class="modal fade" id="largeModal1{{$classe->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <form action="{{route('class_courses.store')}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModal1Label">Assign Courses classes</h4>
                </div>
                <div class="modal-body"> 
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="form-line">
                                <label for="">List of courses</label>
                                    <select name="list_course[]" id="" class="form-control" multiple="multiple">
                                        @foreach($courses as $course)
                                            <option value="{{$course->name}}">{{$course->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="id_class" value="{{$classe->id}}">
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