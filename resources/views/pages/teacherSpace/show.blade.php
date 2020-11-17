@extends('layouts.apps')

@section('content')
<div class="padding-y-60 bg-cover" data-dark-overlay="6" style="background:url({{asset('assets/img/breadcrumb-bg.jpg')}}) no-repeat">
  <div class="container">
    <h1 class="text-white">
      Post Details
    </h1>
    <ol class="breadcrumb breadcrumb-double-angle text-white bg-transparent p-0">  
        {{$post->course}}
    </ol>
  </div>
</div>
<section class="pt-5 paddingBottom-150 bg-light-v2">
    <div class="container">
    @if(auth()->user()->role == 'TEA')
    <a href="{{route('post_class',$post->id_classe)}}">
        <button class="btn btn-icon btn-outline-primary mr-2 mb-3">
            <i class="ti-angle-double-left mr-2"></i>
            <span>Go Back</span>
        </button>
    </a>
    @else
    <a href="{{route('space_work')}}">
        <button class="btn btn-icon btn-outline-primary shadow-primary mr-2 mb-3">
            <i class="ti-home mr-2"></i>
            <span>Home</span>
        </button>
    </a>
    @endif
    <div class="card shadow-v5 mt-5 padding-40">
        <div class="media">
            <div class="media-body">
                <h4>
                {{$post->title}}
                </h4>
                <p>
                {{$post->content}}
                </p>
                <a href="{{route('download_course',$post->id)}}">
                    <button class="btn btn-icon btn-outline-info btn-pill mr-2 mb-3">
                        <i class="ti-import mr-2"></i>
                        <span>Download Course</span>
                    </button>
                </a>
            </div>
        </div>
    </div>
    <hr>
    <div class="card shadow-v3 mt-4 padding-50">
        <div class="col-12 text-center mb-5">
            <h2>
            Post Comments
            </h2>
            <div class="width-4rem height-4 bg-primary my-2 mx-auto rounded"></div>
        </div>
        <ol class="list-unstyled comments-area">
            <hr>
            @foreach($comments as $comment)
            <li>
                <div class="media mb-5">
                <img class="iconbox iconbox-lg mr-3" src="{{asset('admin/assets/images/user-demo.png')}}" alt="">
                <div class="media-body">
                @if(auth()->user()->role == 'TEA')
                <a href="#" class="float-right btn btn-outline-primary btn-pill btn-sm">
                    <i class="ti-back-right"></i> REPLY
                </a>
                @endif
                    <h4 class="h5 mb-0">
                        {{App\User::findOrFail($comment->id_user)->first_name}} {{App\User::findOrFail($comment->id_user)->last_name}}
                    </h4>
                    <p class="text-gray">
                        {{date('d - m - y', strtotime($comment->created_at))}}
                    </p>
                    <p>
                        {{$comment->content}}
                    </p>
                </div>
                </div>
            </li>
            <hr>
            @endforeach
        </ol>
    </div>
    @if(auth()->user()->role == 'STU')
    <section class="padding-y-100 bg-light-v2">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2>
                        Comment this Post
                    </h2>
                    <div class="width-4rem height-4 bg-primary my-2 mx-auto rounded"></div>
                </div>
                <div class="col-12 text-center">
                    <form action="{{route('comments.store')}}" method="POST" class="card p-4 p-md-5 shadow-v1">
                    @csrf
                        <p class="lead mt-2">
                            Your Comment will be read by the teacher so write an intelligence text...
                        </p>
                        <div class="row mt-5 mx-0">
                            <div class="col-12">
                                <input type="hidden" value = {{auth()->user()->id}} name="id_user">
                                <input type="hidden" value = {{$post->id}} name="id_post">
                                <textarea type="text" name="content" class="form-control" placeholder="Message" rows="7"></textarea>
                                <button type="submit" class="btn btn-primary mt-4">Publish Now</button>
                            </div>
                        </div>
                    </form>  
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>
    @endif
  </div> <!-- END container-->
</section>  <!-- END section -->

@endsection
