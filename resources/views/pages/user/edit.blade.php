@extends('layouts.dashboard')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Edit User</h2>
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
                    <form action="{{route('users.update' , $user->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                        <div class="row clearfix">
                            <div class="col-lg-3 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="first_name" value="{{$user->first_name}}" class="form-control" placeholder="First Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="last_name" value="{{$user->last_name}}" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="country" value="{{$user->country}}" class="form-control" placeholder="Country">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="town" value="{{$user->town}}" class="form-control" placeholder="Town">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">   
                            <div class="col-lg-3 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="phone_numb" value="{{$user->phone_numb}}" class="form-control" placeholder="Phone No.">
                                    </div>
                                </div>
                            </div>                         
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="date_of_birth" value="{{$user->date_of_birth}}" class="datepicker form-control" placeholder="Date of Birth">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="form-group drop-custum">
                                    <select class="form-control show-tick">
                                        <option value="">-- Role --</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->code}}" @if($role->code == $user->role) 'selected' @endif>{{$role->libelle}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                            
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="Enter Your Email">
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
