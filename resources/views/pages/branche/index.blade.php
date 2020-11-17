@extends('layouts.dashboard')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Branches</h2>
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
                <a href="#" data-toggle="modal" data-target="#largeModal" class="btn btn-raised g-bg-cyan">Add Branche</a>
            </div>
        </div>
        <hr>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>All Branches of institute</h2>
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
                                        <th>CODE</th>
                                        <th>CREATE AT</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($branches as $branche)
                                    <tr>
                                        <td>{{$branche->id}}</td>
                                        <td class="txt-oflo">{{$branche->name}}</td>
                                        <td>{{$branche->code}} </td>
                                        <td class="txt-oflo">{{date('d - m - y',strtotime($branche->created_at))}}</td>
                                        <td>
                                            <a id="{{$branche->id}}" data-toggle="modal" data-target="#largeModal{{$branche->id}}" href="{{route('branches.edit', $branche->id)}}"><button type="button" class="btn cbtn-raised btn-warning waves-effect"> <i class="material-icons">create</i> </button></a>
                                            <form action="{{route('branches.destroy', $branche->id)}}" method="post" style="display: inline;">
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
@foreach($branches as $branche)
<div class="modal fade" id="largeModal{{$branche->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <form action="{{route('branches.update',$branche->id)}}" method="post">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Update Branches</h4>
                </div>
                <div class="modal-body"> 
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="">Name of the branche</label>
                                    <input type="text" class="form-control" value="{{$branche->name}}" name="name" placeholder="Ex: Génie Logiciel">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="">Code of the branche</label>
                                    <input type="text" class="form-control" value="{{$branche->code}}" name="code" placeholder="Ex: GL">
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
        <form action="{{route('branches.store')}}" method="post">
        @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Create Branches</h4>
                </div>
                <div class="modal-body"> 
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="">Name of the branche</label>
                                    <input type="text" class="form-control" name="name" placeholder="Ex: Génie Logiciel">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="">Code of the branche</label>
                                    <input type="text" class="form-control" name="code" placeholder="Ex: GL">
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