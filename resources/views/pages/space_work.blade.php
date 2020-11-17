@extends('layouts.apps')

@section('content')

<div class="padding-y-60 bg-cover" data-dark-overlay="6" style="background:url({{(auth()->user()->picture)}}) no-repeat">
  <div class="container">
    <h2 class="text-white">
        Welcome  {{auth()->user()->first_name}} {{auth()->user()->last_name}}
    </h2>
    <small class="text-white">{{auth()->user()->role == 'TEA' ? 'TEACHER' : 'STUDENT'}}</small>
    <div class="text-gray float-right">
      <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit()"; title="sign out" ><i class="zmdi zmdi-sign-in"></i>
      <button class="btn btn-icon btn-danger mr-2 mb-3">
          <i class="ti-user mr-2"></i>
          <span>Logout</span>
      </button>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
    </div>
  </div>
</div>
   
@if(auth()->user()->role == 'TEA')   
<section class="padding-y-100 bg-light">
  <div class="container">
    <div class="row">
    
     <div class="col-12">
       <div class="nav btn-group btn-group-pill justify-content-center" role="tablist">
        <a class="btn btn-white shadow-v1 active" data-toggle="tab" href="#TabsStudents" role="tab" aria-selected="true">
          Menu
        </a>
        <a class="btn btn-white shadow-v1" data-toggle="tab" href="#TabsInstructor" role="tab" aria-selected="true">
          Settings
        </a>
      </div>
     </div>
     
     <div class="col-12 text-center mt-5 mb-4">
        <p>
          SuccessAccademia
        </p>
        <h4>
          Select the operation you want to perform
        </h4>
     </div>
      
      
      <div class="col-12">
        <div class="tab-content">
          <div class="tab-pane fade show active" id="TabsStudents" role="tabpanel">
            <div class="row text-center">            
             <div class="col-lg-6 col-md-6 marginTop-30">
               <a href="#" class="card height-100p p-5 shadow-v1 hover:primary" data-toggle="modal" data-target="#modal__Default1">
                 <i class="ti-camera text-primary display-4"></i>
                 <h4 class="my-4">
                    Video Conference
                 </h4>
                 <p>
                   Start a course by videoconference
                 </p>
               </a>
             </div>
            
             <div class="col-lg-6 col-md-6 marginTop-30">
               <a href="#" data-toggle="modal" data-target="#modal__Default2" class="card height-100p p-5 shadow-v1 hover:primary">
                 <i class="ti-comment-alt text-primary display-4"></i>
                 <h4 class="my-4">
                   Post Forum
                 </h4>
                 <p>
                   Post a course and documents on the forum
                 </p>
               </a>
             </div>
             
           </div>
          </div>
          
          <div class="tab-pane fade" id="TabsInstructor" role="tabpanel">
            <div class="row text-center">
            
             <div class="col-lg-4 col-md-6 marginTop-30">
               <a href="page-help-%26-support-topics.html" class="card height-100p p-5 shadow-v1 hover:primary"> 
                 <i class="ti-bookmark-alt text-primary display-4"></i>
                 <h4 class="my-4">
                   About
                 </h4>
                 <p>
                   Learn how SuccessAccademia works and how to start learning.
                 </p>
               </a>
             </div>
            
             <div class="col-lg-4 col-md-6 marginTop-30">
               <a href="page-help-%26-support-topics.html" class="card height-100p p-5 shadow-v1 hover:primary"> 
                 <i class="ti-user text-primary display-4"></i>
                 <h4 class="my-4">
                   Account / Profile
                 </h4>
                 <p>
                   Manage your account settings.
                 </p>
               </a>
             </div>
            
             <div class="col-lg-4 col-md-6 marginTop-30">
               <a href="page-help-%26-support-topics.html" class="card height-100p p-5 shadow-v1 hover:primary">
                 <i class="ti-settings text-primary display-4"></i>
                 <h4 class="my-4">
                   Settings
                 </h4>
                 <p>
                   Experiencing a bug? Check here.
                 </p>
               </a>
             </div>
           </div>
          </div>
        </div> <!-- END tab-content-->
      </div>
      
      <div class="col-12 mt-5">
        <div class="col-lg-4 col-md-6 mx-auto">
           <a href="#" class="card height-100p p-5 bg-primary text-center text-white">
             <i class="ti-help text-white display-4"></i>
             <h4 class="my-4">
               Need More Help?
             </h4>
             <p>
               Open a Support Ticket
             </p>
           </a>
        </div>
      </div>
      
    </div> <!-- END row-->
  </div> <!-- END container-->
</section>
<!-- Modal default1-->
<div class="modal fade" id="modal__Default1" tabindex="-1" role="dialog" aria-labelledby="modal__Default1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Select The course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="ti-close font-size-14"></i>
        </button>
      </div>
      <form action="" method="get">
        <div class="modal-body py-4">
            <select class="form-control" name="course_give" id="">
                @foreach($courses as $course)
                    @if(\Illuminate\Support\Str::contains($course_teach, $course->name))
                        <option value="{{$course->name}}">{{$course->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="modal-footer py-4">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Next Step</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal default2-->
<div class="modal fade" id="modal__Default2" tabindex="-1" role="dialog" aria-labelledby="modal__Default2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Select The course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="ti-close font-size-14"></i>
        </button>
      </div>
      <form action="{{route('list_class')}}" method="post">
        @csrf
        <div class="modal-body py-4">
            <select class="form-control"  name="course_give" id="">
                @foreach($courses as $course)
                    @if(\Illuminate\Support\Str::contains($course_teach, $course->name))
                        <option value="{{$course->name}}">{{$course->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="modal-footer py-4">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Next Step</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal default3-->
<div class="modal fade" id="modal__Default3" tabindex="-1" role="dialog" aria-labelledby="modal__Default3" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Select The course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="ti-close font-size-14"></i>
        </button>
      </div>
      <form action="" method="get">
        <div class="modal-body py-4">
            <select class="form-control" name="course_give" id="">
                @foreach($courses as $course)
                    @if(\Illuminate\Support\Str::contains($course_teach, $course->name))
                        <option value="{{$course->name}}">{{$course->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="modal-footer py-4">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Next Step</button>
        </div>
      </form>
    </div>
  </div>
</div>
@else
<section class="padding-y-100 bg-light">
  <div class="container">
    <div class="row">
    
     <div class="col-12">
       <div class="nav btn-group btn-group-pill justify-content-center" role="tablist">
        <a class="btn btn-white shadow-v1 active" data-toggle="tab" href="#TabsStudents" role="tab" aria-selected="true">
          Menu
        </a>
        <a class="btn btn-white shadow-v1" data-toggle="tab" href="#TabsInstructor" role="tab" aria-selected="true">
          Settings
        </a>
      </div>
     </div>
     
     <div class="col-12 text-center mt-5 mb-4">
        <p>
          SuccessAccademia
        </p>
        <h4>
          Select the operation you want to perform
        </h4>
     </div>
     <hr>
      <div class="col-12">
        <div class="tab-content">
          <div class="tab-pane fade show active" id="TabsStudents" role="tabpanel">
            <div class="row text-center">            
             <div class="col-lg-4 col-md-6 marginTop-30">
               <a href="#" class="card height-100p p-5 shadow-v1 hover:primary" data-toggle="modal" data-target="#modal__Default1">
                 <i class="ti-camera text-primary display-4"></i>
                 <h4 class="my-4">
                    Video Conference
                 </h4>
                 <p>
                   Participe at course by videoconference
                 </p>
               </a>
             </div>
            
             <div class="col-lg-4 col-md-6 marginTop-30">
               <a href="#" data-toggle="modal" data-target="#modal__Default2" class="card height-100p p-5 shadow-v1 hover:primary">
                 <i class="ti-comment-alt text-primary display-4"></i>
                 <h4 class="my-4">
                   Open Forum
                 </h4>
                 <p>
                   Participe at course and download documents on the forum
                 </p>
               </a>
             </div>
              <div class="col-lg-4 col-md-6 marginTop-30">
                <a href="{{route('download',auth()->user()->class)}}" class="card height-100p p-5 shadow-v1 bg-warning text-center text-white">
                  <i class="ti-bookmark-alt text-white display-4"></i>
                  <h4 class="my-4">
                    Time table
                  </h4>
                  <p>
                    Download Time Table of your classe, Click Here
                  </p>
                </a>
              </div>
           </div>
          </div>
          
          <div class="tab-pane fade" id="TabsInstructor" role="tabpanel">
            <div class="row text-center">
            
             <div class="col-lg-4 col-md-6 marginTop-30">
               <a href="page-help-%26-support-topics.html" class="card height-100p p-5 shadow-v1 hover:primary"> 
                 <i class="ti-bookmark-alt text-primary display-4"></i>
                 <h4 class="my-4">
                   About
                 </h4>
                 <p>
                   Learn how SuccessAccademia works and how to start learning.
                 </p>
               </a>
             </div>
            
             <div class="col-lg-4 col-md-6 marginTop-30">
               <a href="page-help-%26-support-topics.html" class="card height-100p p-5 shadow-v1 hover:primary"> 
                 <i class="ti-user text-primary display-4"></i>
                 <h4 class="my-4">
                   Account / Profile
                 </h4>
                 <p>
                   Manage your account settings.
                 </p>
               </a>
             </div>
            
             <div class="col-lg-4 col-md-6 marginTop-30">
               <a href="page-help-%26-support-topics.html" class="card height-100p p-5 shadow-v1 hover:primary">
                 <i class="ti-settings text-primary display-4"></i>
                 <h4 class="my-4">
                   Settings
                 </h4>
                 <p>
                   Experiencing a bug? Check here.
                 </p>
               </a>
             </div>
           </div>
          </div>
        </div> <!-- END tab-content-->
      </div>
      
      <div class="col-12 mt-5">
        <div class="col-lg-4 col-md-6 mx-auto">
           <a href="#" class="card height-100p p-5 bg-primary text-center text-white">
             <i class="ti-help text-white display-4"></i>
             <h4 class="my-4">
               Need More Help?
             </h4>
             <p>
               Open a Support Ticket
             </p>
           </a>
        </div>
      </div>
      
    </div> <!-- END row-->
  </div> <!-- END container-->
</section>
<!-- Modal default1-->
<div class="modal fade" id="modal__Default1" tabindex="-1" role="dialog" aria-labelledby="modal__Default1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Select The course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="ti-close font-size-14"></i>
        </button>
      </div>
      <form action="" method="get">
        <div class="modal-body py-4">
            <select class="form-control" name="course_give" id="">
                @foreach($courses as $course)
                    @if(\Illuminate\Support\Str::contains($course_class, $course->name))
                        <option value="{{$course->name}}">{{$course->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="modal-footer py-4">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Next Step</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal default2-->
<div class="modal fade" id="modal__Default2" tabindex="-1" role="dialog" aria-labelledby="modal__Default2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Select The course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="ti-close font-size-14"></i>
        </button>
      </div>
      <form action="{{route('list_class')}}" method="post">
        @csrf
        <div class="modal-body py-4">
            <select class="form-control"  name="course_give" id="">
                @foreach($courses as $course)
                    @if(\Illuminate\Support\Str::contains($course_class, $course->name))
                        <option value="{{$course->name}}">{{$course->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="modal-footer py-4">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Next Step</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal default3-->
<div class="modal fade" id="modal__Default3" tabindex="-1" role="dialog" aria-labelledby="modal__Default3" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Select The course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="ti-close font-size-14"></i>
        </button>
      </div>
      <form action="" method="get">
        <div class="modal-body py-4">
            <select class="form-control" name="course_give" id="">
                @foreach($courses as $course)
                    @if(\Illuminate\Support\Str::contains($course_class, $course->name))
                        <option value="{{$course->name}}">{{$course->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="modal-footer py-4">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Next Step</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endif

@endsection