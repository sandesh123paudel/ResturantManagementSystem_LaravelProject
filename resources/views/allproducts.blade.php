@extends('master')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PldpV/HzfhQa8Q1rUFO8wA+3I1E/ApGgAOl9xXbe5B9vZ" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/menu.css')}}">

    <section class="page-section">
        <div class="container mt-5">
            <div class="row">

                <div class="col-lg-3 blog-form">
                    <h2 class="blog-sidebar-title"><b>Cart</b></h2>
                    <hr />
                    <p class="blog-sidebar-text">No products in the cart...</p>
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>

                    <h2 class="blog-sidebar-title"><b>Categories</b></h2>
                    <hr />


                    @foreach ($categories as $category)
                        <p class="blog-sidebar-list"><b><span class="list-icon"> > </span> {{$category->name}}</b></p>
                    @endforeach


                    <div>&nbsp;</div>
                    <div>&nbsp;</div>

                    <h2 class="blog-sidebar-title"><b>Filter</b></h2>
                    <hr />

                    <p class="tags">Price $4 - $25</p>
                    <button type="button" class="btn btn-dark btn-lg">Filter</button>

                </div>
                <!--END  <div class="col-lg-3 blog-form">-->

                <div class="col-lg-9" style="padding-left: 30px;">
                    <div class="row">

                        <div class="col">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        



                        <div class="col">
                            <select class="form-control">
                                <option value="">Default Sorting</option>
                                <option value="popularity">Sorting by High-Low Price</option>
                                <option value="average">Sorting by Low-High Price</option>
                                <option value="average">Sorting by Latest Item</option>


                            </select>
                        </div>

                    </div>
                    <!-- Sorting by <div class="row"> -->
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>

                    <div class="row">
                        @foreach ($viewproducts as $product)
                            <div class="col-sm-3 col-md-7 col-lg-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <img src="{{ asset('storage/' . $product->product_image) }}" class="product-image">
                                        <h5 class="card-title"><b>{{ $product->name }}</b></h5>
                                        <p class="card-text small">{{ $product->description }}</p>
                                        <p class="price-tag"> Rs.{{ $product->price }}</p>
                                        <a href=""target="_blank" class="btn btn-secondary button-text"><i
                                                class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                    </div>




                </div>

            </div>
        </div>
    </section>
@endsection


