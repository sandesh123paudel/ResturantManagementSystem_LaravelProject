@extends('admin.layouts.app')

@section('content')

<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Product</h1>
            </div>
        </div>
        
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->

<section class="content">
    
    <!-- Default box -->
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">								
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Title">	
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" id="description" class="form-control" placeholder="Description">	
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Image</label>
                                    <input type="text" name="description" id="description" class="form-control" placeholder="Description">	
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Category</label>
                                    <input type="text" name="description" id="description" class="form-control" placeholder="Description">	
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" id="description" class="form-control" placeholder="Description">	
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Price</label>
                                    <input type="text" name="description" id="description" class="form-control" placeholder="Description">	
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Remarks</label>
                                    <input type="text" name="description" id="description" class="form-control" placeholder="Description">	
                                </div>
                            </div>

                            
                           
                                                                        
                        </div>
                    </div>	                                                                      
                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary">Create</button>
                    <a href={{route('admin.products')}} class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
        </div>
        
       
    </div>
    <!-- /.card -->
</section>
    
@endsection