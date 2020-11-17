@extends('layouts.apps')

@section('content')
    <section class="padding-y-100 border-bottom border-light">
        <div class="container">
            <form action="{{route('school.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mt-5">
                    <div class="col-12 text-center my-5">
                        <h3>
                            Please Fill This Form To create your Institute
                        </h3>
                    </div>
                    <div class="col-12 mx-auto">
    
                        <div class="row form-group">
                            <label for="example-text-input" class="col-2 col-form-label text-right">Name</label>
                            <div class="col-10">
                                <input class="form-control" name="name" type="text"  id="example-text-input">
                            </div>
                        </div>
    
                        
                        <div class="row form-group">
                            <label for="example-email-input" class="col-2 col-form-label text-right">Town</label>
                            <div class="col-10">
                                <input class="form-control" name="town" type="text" id="example-email-input">
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label for="example-search-input" class="col-2 col-form-label text-right">Code Postal</label>
                            <div class="col-10">
                                <input class="form-control" name="code" type="text"  id="example-search-input">
                            </div>
                        </div>
    
                        <div class="row form-group">
                            <label for="example-url-input" class="col-2 col-form-label text-right">Country</label>
                            <div class="col-10">
                                <input class="form-control" name="country" type="text" id="example-url-input">
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label for="example-url-input" class="col-2 col-form-label text-right">Logo</label>
                            <div class="col-10">
                                <input class="form-control" name="logo" type="file" id="example-url-input">
                            </div>
                        </div>
    
                        <div class="row form-group">
                            <label for="example-tel-input" class="col-2 col-form-label text-right">Description</label>
                            <div class="col-10">
                                <textarea class="form-control" name="description" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-block btn-primary">Create Now</button>
                        </div>
                    </div>
                </div> <!-- END row-->
            </form>
        </div> <!-- END container-->
    </section>
@endsection