@extends('layouts.apps')

@section('content')

<div class="py-5 bg-cover" data-dark-overlay="6" style="background:url(assets/img/1920/658_2.jpg) no-repeat">
  <div class="container">
    <h2 class="text-white">
      Contact
    </h2>
    <ol class="breadcrumb breadcrumb-double-angle text-white bg-transparent p-0">  
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item">Contact</li>
    </ol>
  </div>
</div>
    
   
   
  <div class="py-5 shadow-v2 position-relative">
    <div class="container">
      <div class="row">
      
        <div class="col-lg-4 col-md-6 mt-4">
          <div class="media">
            <span class="iconbox iconbox-md bg-primary text-white"><i class="ti-mobile"></i></span>
            <div class="media-body ml-3">
            <h5 class="mb-0">1-800-643-4500</h5> 
            <p>Call Us (8AM-10PM)</p>
            </div>
          </div>
        </div>
      
        <div class="col-lg-4 col-md-6 mt-4">
          <div class="media">
            <span class="iconbox iconbox-md bg-primary text-white"><i class="ti-email"></i></span>
            <div class="media-body ml-3">
            <a href="mailto:support@echotheme.com" class="h5">support@echotheme.com</a>
            <p>Call Us (8AM-10PM)</p>
            </div>
          </div>
        </div>
      
        <div class="col-lg-4 col-md-6 mt-4">
          <div class="media">
            <span class="iconbox iconbox-md bg-primary text-white"><i class="ti-location-pin"></i></span>
            <div class="media-body ml-3">
            <h5 class="mb-0">New York Avenue, USA</h5> 
            <p>Unit 25 Suite 3, 925 Prospect</p>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
   
   
   
   
<section class="padding-y-100 bg-light-v2">
  <div class="container">
    <div class="row">
     <div class="col-12 text-center mb-5">
        <h2>
          Send Message
        </h2>
        <div class="width-4rem height-4 bg-primary my-2 mx-auto rounded"></div>
      </div>
      <div class="col-12 text-center">
        <form action="#" method="POST" class="card p-4 p-md-5 shadow-v1">
          <p class="lead mt-2">
            Investig tiones demons travge wunt ectores legere lkurus quod legunt saepiu clear <br> tasest consectetur adipi sicing elitsed eusmod tempor cididunt.
          </p>
          <div class="row mt-5 mx-0">
            <div class="col-md-4 mb-4">
              <input type="text" class="form-control" placeholder="Name" required>
            </div>
            <div class="col-md-4 mb-4">
              <input type="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="col-md-4 mb-4">
              <input type="email" class="form-control" placeholder="Phone number">
            </div>
            <div class="col-12">
              <textarea type="email" class="form-control" placeholder="Message" rows="7"></textarea>
              <button type="submit" class="btn btn-primary mt-4">Send Message</button>
            </div>
          </div>
        </form>  
      </div>
      
    </div> <!-- END row-->
  </div> <!-- END container-->
</section>

@endsection