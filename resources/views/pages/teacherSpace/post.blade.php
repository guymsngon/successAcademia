@extends('layouts.apps')

@section('content')
<div class="py-5 bg-light-v2">
  <div class="container">
   <div class="row align-items-center">
     <div class="col-md-6">
      @if(auth()->user()->role == 'TEA')
       <h2>List of Your Posts to {{App\Classe::findOrFail($id_class)->name}}</h2>
       @else
       <h2>List of Posts of {{$course}}</h2>
      @endif
     </div>
   </div>
  </div> 
</div>
<section class="paddingTop-50 paddingBottom-100 bg-light-v2">
  <div class="container">
    <a href="{{route('space_work')}}">
        <button class="btn btn-icon btn-outline-primary shadow-primary mr-2 mb-3">
            <i class="ti-home mr-2"></i>
            <span>Home</span>
        </button>
    </a>
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
      @foreach($posts as $post)
      <div class="col-lg-6 mt-5">
        <div class="d-md-flex justify-content-between align-items-center bg-white shadow-v1 rounded mb-4 py-4 px-5 hover:transformLeft">
          <div class="media align-items-center">
            <div class="text-center border-right pr-4">
             <strong class="text-primary font-size-38">
               {{$post->id}}
             </strong>
              <p class="mb-0 text-gray">
                {{date('d - m - y', strtotime($post->created_at))}}
              </p>
            </div>
            <div class="media-body p-4">
             <p class="mb-1 text-gray">
              <i class="ti-file"></i>
                {{$post->course}}
             </p>
              <a href="{{route('posts.show',$post->id)}}" class="h5">
                {{$post->title}}
              </a>
            </div>
          </div>
          <a href="{{route('posts.show',$post->id)}}" class="btn btn-outline-primary">Read More</a> 
        </div>
      </div>
      @endforeach 
    </div> <!-- END row-->
  </div> <!-- END container-->
</section> 

@endsection
