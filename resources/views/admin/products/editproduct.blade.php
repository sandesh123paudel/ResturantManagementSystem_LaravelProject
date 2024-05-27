@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Product "{{ $product->name }}"</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href={{ route('admin.products') }} class="btn btn-primary">Back</a>
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
                            <form action={{ url('admin/updateproduct/' . $product->id) }} method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="name">Product Name</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Product Name" value="{{ $product->name }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control" placeholder="Product Description">{{ $product->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" id="image" class="form-control"
                                                value="">
                                            @if ($product->product_image)
                                                <img src="{{ asset('storage/' . $product->product_images) }}"
                                                    alt="Product Image" style="max-width: 100px; max-height: 100px;">
                                            @else
                                                <p>No image available</p>
                                            @endif
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="category">Category</label>
                                            <select name="category" id="category" class="form-control">
                                                <option value="" disabled>Select a category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id === $product->category_id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" id="price" class="form-control"
                                                placeholder="Price" value="{{ $product->price }}">
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="item">Item Type</label>
                                            <select name="item" id="item" class="form-control">
                                                <option value="veg" {{ $product->item === 'veg' ? 'selected' : '' }}>Veg
                                                </option>
                                                <option value="non-veg"
                                                    {{ $product->item === 'non-veg' ? 'selected' : '' }}>Non-Veg</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="pb-5 pt-3">
                                    <button type="submit" class="btn btn-primary">Update Product</button>
                                    <a href="{{ route('admin.products') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
@endsection
