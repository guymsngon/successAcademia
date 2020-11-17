@extends('layouts.apps')

@section('content')

<section class="padding-y-100 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mx-auto">
        <div class="card shadow-v2"> 
            <div class="card-header border-bottom">
                <h4 class="mt-4">
                    Sign Up and <span class="text-primary"> Start!</span>
                </h4>
            </div>         
            <div class="card-body">
            
            <form action="{{route('post_register')}}" method="POST" class="px-lg-4">
            @csrf
                <div class="container" id="info">
                    <div class="input-group input-group--focus mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text bg-white ti-user"></span>
                        </div>
                        <input type="text" name="first_name" class="form-control border-left-0 pl-0" placeholder="First name" required>
                    </div>
                    <div class="input-group input-group--focus mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text bg-white ti-user"></span>
                        </div>
                        <input type="text" name="last_name" class="form-control border-left-0 pl-0" placeholder="Last name">
                    </div>
                    <div class="input-group input-group--focus mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text bg-white ti-email"></span>
                        </div>
                        <input type="email" name="email" class="form-control border-left-0 pl-0" placeholder="Email" required>
                    </div>
                    <div class="input-group input-group--focus mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text bg-white ti-lock"></span>
                        </div>
                        <input type="password" name="password" class="form-control border-left-0 pl-0" placeholder="Password" required>
                    </div>
                    <input type="button" onclick="getpay()" class="btn btn-block btn-primary" value="Next Step">
                </div>
                <div id="pay" style="display:none">
                    <div id="paypal-button-container"></div>
                    <div class="my-4">
                        <label class="ec-checkbox check-sm my-2 clearfix">
                            <input type="checkbox" name="checkbox" required>
                            <span class="ec-checkbox__control mt-1"></span>
                            <span class="ec-checkbox__lebel">
                                By signing up, you agree to our 
                                <a href="{{route('term')}}" class="text-primary">Terms of Use</a>
                                and
                                <a href="{{route('term')}}" class="text-primary">Privacy Policy.</a>
                            </span>
                        </label>
                    </div>
                    <button class="btn btn-block btn-primary">Sing Up</button>
                </div>
                <p class="my-5 text-center">
                    Already have an account? <a href="{{route('login')}}" class="text-primary">Login</a>
                </p>
            </form>
          </div>
        </div>
      </div> 
    </div> <!-- END row-->
  </div> <!-- END container-->
</section>

<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

<script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({
        
        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '10.000 '
                    }
                }]
            });
        },

        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Show a success message to the buyer
                alert('Transaction completed by ' + details.payer.name.given_name + '!');
            });
        }


    }).render('#paypal-button-container');

    function getpay(){
        document.getElementById('pay').style.display = "block" ;
        document.getElementById('info').style.display = "none" ;
    }
</script>

@endsection