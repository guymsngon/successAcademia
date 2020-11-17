@extends('layouts.dashboard')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Classes</h2>
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
        <div class="row">
            <div class="col-lg-6">
                <a href="#" data-toggle="modal" data-target="#largeModal" class="btn btn-raised g-bg-cyan">Add Classe</a>
            </div>
        </div>
        <hr>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>All Classes of institute</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NAME</th>
                                        <th>LEVEL</th>
                                        <th>CREATE AT</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($classes as $classe)
                                    <tr>
                                        <td>{{$classe->id}}</td>
                                        <td class="txt-oflo">{{$classe->name}}</td>
                                        <td>{{$classe->level}} </td>
                                        <td class="txt-oflo">{{date('d - m - y',strtotime($classe->created_at))}}</td>
                                        <td>
                                            <a id="{{$classe->id}}" data-toggle="modal" data-target="#largeModal{{$classe->id}}" href="{{route('classes.edit', $classe->id)}}"><button type="button" class="btn cbtn-raised btn-warning waves-effect"> <i class="material-icons">create</i> </button></a>
                                            <a  href="{{route('classes.show', $classe->id)}}"><button type="button" class="btn cbtn-raised btn-primary waves-effect"> <i class="material-icons">visibility</i> </button></a>
                                            <form action="{{route('classes.destroy', $classe->id)}}" method="post" style="display: inline;">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn cbtn-raised btn-danger waves-effect"> <i class="material-icons">delete</i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
        <!-- #END# Example -->
    </div>
</section>
<!-- Edit Modal  -->
@foreach($classes as $classe)
<div class="modal fade" id="largeModal{{$classe->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <form action="{{route('classes.update',$classe->id)}}" method="post">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Update classes</h4>
                </div>
                <div class="modal-body"> 
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="form-line">
                                <label for="">Level of the classe</label>
                                    <select name="level" id="" class="form-control">
                                        <option value="L1" @if($classe->level == 'L1') {{'selected'}} @endif >Licence 1</option>
                                        <option value="L2" @if($classe->level == 'L2') {{'selected'}} @endif >Licence 2</option>
                                        <option value="L3" @if($classe->level == 'L3') {{'selected'}} @endif >Licence 3</option>
                                        <option value="M1" @if($classe->level == 'M1') {{'selected'}} @endif >Master 1</option>
                                        <option value="M2" @if($classe->level == 'M2') {{'selected'}} @endif >Master 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="">Code of the classe</label>
                                    <select name="branche" class="form-control" id="">
                                        @foreach(App\Branche::where('id_school', auth()->user()->id_school)->get() as $branche)
                                            <option value="{{$branche->code}}" @if($classe->branche == $branche->code) {{'selected'}} @endif >{{$branche->name}}</option>
                                        @endforeach                                                                                            
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect">UPDATE</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
<!-- End Edit Modal  -->


<!--  Modal  -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <form action="{{route('classes.store')}}" method="post">
        @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Create classes</h4>
                </div>
                <div class="modal-body"> 
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="">Level of the classe</label>
                                    <select name="level" id="" class="form-control">
                                        <option value="L1">Licence 1</option>
                                        <option value="L2">Licence 2</option>
                                        <option value="L3">Licence 3</option>
                                        <option value="M1">Master 1</option>
                                        <option value="M2">Master 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="">Branche of the classe</label>
                                    <select name="branche" class="form-control" id="">
                                        @foreach(App\Branche::where('id_school', auth()->user()->id_school)->get() as $branche)
                                            <option value="{{$branche->code}}">{{$branche->name}}</option>
                                        @endforeach                                                                                            
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect">SAVE</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End  Modal  -->
@endsection