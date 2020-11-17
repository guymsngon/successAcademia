@extends('layouts.dashboard')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Create User</h2>
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
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Basic Information <small>Description text here...</small> </h2>
						<ul class="header-dropdown m-r--5">
							<li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
								<ul class="dropdown-menu pull-right">
									<li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
									<li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
									<li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="body">
                    <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="row clearfix">
                            <div class="col-lg-3 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="">first Name</label>
                                        <input type="text" name="first_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="">Last Name</label>
                                        <input type="text" name="last_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="">Country</label>
                                        <input type="text" name="country" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="">Town</label>
                                        <input type="text" name="town" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">   
                            <div class="col-lg-3 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="">Phone</label>
                                        <input type="text" name="phone_numb" class="form-control">
                                    </div>
                                </div>
                            </div>                         
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="">Birth Date</label>
                                        <input type="date" name="date_of_birth"  class="datepicker form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="form-group drop-custum">
                                    <label for="">Select role user</label>
                                    <select name="role" class="form-control show-tick">
                                        <option value="">-- Role --</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->code}}">{{$role->libelle}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                            
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                        <div class="col-lg-12 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for=""> Select your picture profile </label>
                                        <input type="file" name="picture" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">                            
                            <div class="">
                                <button type="submit" class="btn btn-raised g-bg-cyan">Submit</button>
                                <a href="{{route('home')}}"><button type="button" class="btn btn-raised">Cancel</button></a>  
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>       
    </div>
</section>
@endsection
