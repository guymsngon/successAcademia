@extends('layouts.apps')

@section('content')
<div class="py-5 bg-light-v2">
  <div class="container">
   <div class="row align-items-center">
     <div class="col-md-6">
       <h2>List of Classes who does {{$course}}</h2>
     </div>
   </div>
  </div> 
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
<section class="padding-y-100 border-bottom border-light wow fadeIn">
    <div class="container">
        <a href="{{route('space_work')}}">
            <button class="btn btn-icon btn-outline-primary shadow-primary mr-2 mb-3">
                <i class="ti-home mr-2"></i>
                <span>Home</span>
            </button>
        </a>
        <div class="col-lg-12 my-4">
            <ul class="list-group">
                @foreach($classes as $classe)
                    @if(\Illuminate\Support\Str::contains($classe->list_course, $course))
                        <li class="list-group-item d-flex align-items-center">
                            <span class="iconbox bg-primary">
                                <i class="ti-home"></i>
                            </span>
                            <div class="media-body ml-3">
                                <p class="font-weight-semiBold mb-0">{{App\Classe::findOrFail($classe->id_class)->name}}</p>
                                <span>Effectif : {{count(App\User::where('class', App\Classe::findOrFail($classe->id_class)->name)->get())}} <small>Students</small></span>
                            </div>
                            <small class="text-gray float-right">
                                <div class="btn-group btn-group-pill" role="group">
                                    <button data-toggle="modal" data-target="#{{$classe->id_class}}" type="button" class="btn btn-warning">
                                        <span class="ti-book"></span>
                                    </button>
                                    <a href="{{route('post_class',$classe->id_class)}}">
                                    <button type="button" class="btn btn-info">
                                        <span class="ti-home"></span>
                                    </button>
                                    </a>
                                </div>
                            </small>
                        </li>
                        <div class="modal fade show" id="{{$classe->id_class}}" tabindex="-1" role="dialog" aria-labelledby="{{$classe->id_class}}">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Post a New Course in {{App\Classe::findOrFail($classe->id_class)->name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="ti-close font-size-14"></i>
                                    </button>
                                </div>
                                <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="modal-body py-4">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Title of Course</label>
                                            <input type="text" name="title" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Content of Course</label>
                                            <textarea class="form-control" name="content" rows="5" id="message-text"></textarea>
                                        </div>
                                        <label for="message-text" class="col-form-label">Upload a file:</label>
                                        <input type="file" class="form-control" name="file1" id=""> 
                                        <div class="form-group">
                                            <input type="hidden" name="id_classe" value="{{$classe->id_class}}">                             
                                            <input type="hidden" name="course" value="{{$course}}">
                                        </div>                             
                                    </div>
                                    <div class="modal-footer py-4">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Publishing</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endsection