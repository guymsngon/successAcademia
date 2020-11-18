@extends('layouts.apps')

@section('content')

<div class="py-5 bg-dark">
    <div class="container">
     <div class="row align-items-center">
       <div class="col-md-6 text-white">
         <h2>About</h2>
       </div>
       <div class="col-md-6">
        <ol class="breadcrumb justify-content-md-end bg-transparent">  
          <li class="breadcrumb-item">
            <a href="/">Home</a>
          </li> 
          <li class="breadcrumb-item">
           About us
          </li>
        </ol>
       </div>
     </div>
    </div> 
  </div>
  <section class="padding-y-100 border-bottom">
    <div class="container">
    <div class="row align-items-center">

        <div class="col-lg-5 mb-4 mr-auto text-center">
            <img class="wow fadeInLeft w-100 rounded" src="assets/img/384x320/2.jpg" alt="">
        </div> 

        <div class="col-lg-6">
            <h2>
                <span class="text-primary">Who</span> We Are
            </h2>
            <div class="width-4rem height-4 bg-primary rounded mt-4 marginBottom-40"></div>
            <p class="mb-5">
                Nam liber tempor cum soluta nobis eleifend option congue is nihil imper iper tem por legere me that doming vulputate velit esse molestie possim wisi enim ad placerat facer possim.
            </p>
            <ul class="list-unstyled list-style-icon list-icon-check-circle">
                <li>
                    Professional and easy to use software
                </li>
                <li>
                    Setup and installations takes 30 seconds
                </li>
                <li>
                    Perfect for any device with pixel perfect design
                </li>
                <li>
                    Setup and installations really really fast
                </li>
            </ul>
        </div> <!-- END col-lg-6 ml-auto-->
    </div> <!-- END row-->
    </div> <!-- END container-->
   </section>
   
   
   
   
   
   <section class="padding-y-100">
    <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <h2>
          What We offer
        </h2>
        <div class="width-4rem height-4 bg-primary rounded mt-4 marginBottom-40"></div>
        <p class="mb-5">
          Nam liber tempor cum soluta nobis eleifend option congue is nihil imper iper tem por legere me that doming vulputate velit esse molestie possim wisi enim ad placerat facer possim.
        </p>
        <div class="media mb-4">
          <i class="ti-user text-primary font-size-30 mt-2"></i>
          <div class="media-body pl-3">
            <h4 class="h5">Work With Any Team</h4>
            <p>
              Nam liber tempor cum soluta nobis eleifend option congue is nihil imper per tem por legere me that doming vulputate.
            </p>
          </div>
        </div>
        <div class="media mb-4">
          <i class="ti-basketball text-primary font-size-30 mt-2"></i>
          <div class="media-body pl-3">
            <h4 class="h5">A Productivity Platform</h4>
            <p>
              Nam liber tempor cum soluta nobis eleifend option congue is nihil imper per tem por legere me that doming vulputate.
            </p>
          </div>
        </div>
        <div class="media mb-4">
          <i class="ti-basketball text-primary font-size-30 mt-2"></i>
          <div class="media-body pl-3">
            <h4 class="h5">Paiement Mode</h4>
            <p>
              Here we explane the paiement mode cum soluta nobis eleifend option congue is nihil imper per tem por legere me that doming vulputate.
            </p>
          </div>
        </div> 
      </div> <!-- END col-lg-6 ml-auto-->
      <div class="col-lg-5 mb-4 mr-auto text-center">
        <img class="wow fadeInRight w-100 rounded" src="assets/img/360x300/4.jpg" alt="">
      </div> 
    </div> <!-- END row-->
    </div> <!-- END container-->
   </section>

@endsection