@extends('layouts.apps')

@section('content')
   <section class="padding-y-100 flex-center jarallax height-100vh" data-dark-overlay="5" style="background:url(assets/img/1920x800/4.jpg) no-repeat">
     <div class="container">
       <div class="row">
         <div class="col-12 text-center text-white marginBottom-80">
           <h1 class="display-md-2 font-weight-bold">Success Academia
           <span class="text-primary">
             <span data-typed-text="School, College, University, E-learning"></span><span>|</span>
           </span>
           </h1>
           <p class="font-size-22 my-4">
           A powerful tool for managing online school programs, 
           </p>
           <div class="clearfix">
             <a href="{{route('login')}}" class="btn btn-primary btn-lg m-3">Get started</a>
             <a href="{{route('contact')}}" class="btn btn-outline-warning btn-lg m-3">Contact Us</a>
             <a href="{{route('about')}}" class="btn btn-info btn-lg m-3">About Us</a>
           </div>
           <div class="clearfix">
          </div>  
         </div>
         
         <div class="col-lg-6 col-md-6 mt-4">
           <div class="border border-white-0_5 p-4 text-center text-white rounded">
             <h2 class="display-4 font-weight-bold">{{count(App\Establishment::all())}}</h2>
             <p>
               Nomber of Establishments
             </p>
           </div>
         </div>
         
         <div class="col-lg-6 col-md-6 mt-4">
           <div class="border border-white-0_5 p-4 text-center text-white rounded">
             <h2 class="display-4 font-weight-bold">{{count(App\User::all())}}</h2>
             <p>
               Nomber of Users
             </p>
           </div>
         </div>
         
       </div> <!-- END row-->
     </div> <!-- END container-->
   </section> 
@endsection