@extends('master')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PldpV/HzfhQa8Q1rUFO8wA+3I1E/ApGgAOl9xXbe5B9vZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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


                    <!-- Update your view -->
                    <!-- Add this inside the loop where you display categories -->

                    <!-- Include jQuery at the top of your HTML -->


                    <!-- Update your view to include data-category attribute -->
                    <!-- Update your view to use anchor tags with href -->
                    @foreach ($categories as $category)
                        <p class="blog-sidebar-list">
                            <a href="{{ route('products.searchSort', ['category' => $category->id]) }}"
                                style="color: inherit; text-decoration: none;">
                                <b><span class="list-icon"> > </span> {{ $category->name }}</b>
                            </a>
                        </p>
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

                    <!-- Include jQuery -->


                    <!-- Update your view -->
                    <div class="row">
                        <form id="searchSortForm" action="{{ route('products.searchSort') }}" method="GET"
                            class="form-inline">
                            <div class="form-group">
                                <label for="search" class="sr-only">Search</label>
                                <input type="text" class="form-control" id="search" name="search"
                                    placeholder="Search" value="{{ request('search') }}">
                            </div>

                            <div class="form-group mx-2">
                                <label for="sort" class="sr-only">Sort</label>
                                <select class="form-control" id="sort" name="sort">
                                    <option value="">Default Sorting</option>
                                    <option value="desc">Sorting by High-Low Price</option>
                                    <option value="asc">Sorting by Low-High Price</option>
                                    <option value="latest">Sorting by Latest Item</option>
                                    <option value="oldest">Sorting by Oldest Item</option>
                                </select>
                            </div>
                            <div class="form-group mx-2">
                                <label class="mr-2">Type:</label>
                                <select class="form-control" id="foodType" name="food_type">
                                    <option value="" {{ request('food_type') === '' ? 'selected' : '' }}>All</option>
                                    <option value="veg" {{ request('food_type') === 'veg' ? 'selected' : '' }}>Veg</option>
                                    <option value="non-veg" {{ request('food_type') === 'nonVeg' ? 'selected' : '' }}>Non-Veg</option>
                                </select>
                                
                            </div>
                    

                            <!-- Add a hidden input field for the category ID -->
                            <input type="hidden" id="category" name="category" value="{{ request('category') }}">

                            <button type="submit" class="btn btn-secondary">Submit</button>

                            <!-- Update your view -->
                            <button type="button" class="btn btn-secondary ml-2" id="resetButton">Reset</button>


                        </form>
                    </div>


                    <script>
                       $(document).ready(function() {
    $('.category-link').click(function(e) {
        // No AJAX here, just let the form submit normally
    });

    function resetForm() {
        // Reset form fields
        $('#search, #sort, #category, #foodType').val('');

        // Submit the form
        $('#searchSortForm').submit();
    }

    $('#resetButton').click(function() {
        resetForm();
    });
});

function submitForm() {
    // No AJAX here, just let the form submit normally
}

                    </script>















<div class="row">
    @forelse ($viewproducts as $product)
        <div class="col-sm-3 col-md-7 col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ asset('storage/' . $product->product_image) }}" class="product-image">
                    <h5 class="card-title"><b>{{ $product->name }}</b></h5>
                    <p class="card-text small">{{ $product->description }}</p>
                    <p class="price-tag"> Rs.{{ $product->price }}</p>
                    <a href="" target="_blank" class="btn btn-secondary button-text">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <p>No products found. Try another one</p>
        </div>
    @endforelse

  
</div>




                </div>

            </div>
        </div>
    </section>
@endsection


<script>
    document.getElementById('sort').addEventListener('change', function() {
        document.getElementById('sortForm').submit();
    });
</script>
