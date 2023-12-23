@extends('admin.layouts.app')


@section('content')


<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Category "{{$category->name}}"</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href={{route('admin.category')}} class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->



<section class="content">
   

    <!-- Default box -->
    <div class="container-fluid">
        <form method="POST" action={{ url('admin/updatecategory/' . $category->id) }} enctype="multipart/form-data">

            @csrf
        
            @method('PUT')
            <div class="card">
                <div class="card-body">	
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Category Name</label>
                                <input type="text" name="name" value="{{ $category->name }}" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Category Name">	
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                
                            <div class="mb-">
                                <label for="category_icon">Category Icon</label>
                                <input type="file" name="category_icon" id="category_icon" class="form-control @error('category_icon') is-invalid @enderror">
                                @error('category_icon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>							
            </div>
        
            <div class="pb-5 pt-3">
                <button class="btn btn-primary" type="submit">Edit</button>
                <a href="{{ route('admin.category') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
        
        
   
    </div>
    <!-- /.card -->
</section>


@endsection

