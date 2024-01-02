@extends('frontend.master')

@section('content')
@if(session('alert-type') == 'success')
<div class="alert alert-success" id="success-alert">
    {{ session('message') }}
</div>

<script>
    setTimeout(function(){
        var successAlert = document.getElementById('success-alert');
        if (successAlert) {
            successAlert.style.display = 'none';
        }
    }, 2000); 
</script>

@endif
    <section class="page-section">
        <div class="container mt-5">
            <div class="row">

                <div class="col-lg-3 blog-form">

                    <h3 class="blog-sidebar-title"><b>Categories</b></h3>
                    <hr />



                    @foreach ($categories as $category)
                        <p class="blog-sidebar-list">
                            <a href="{{ route('products.searchSort', ['category' => $category->id]) }}"
                                style="color: chocolate; text-decoration: none;">
                                <b><span class="list-icon"> > </span> {{ $category->name }}</b>
                            </a>
                        </p>
                    @endforeach





                    <div>&nbsp;</div>
                    <div>&nbsp;</div>

                    <h3 class="blog-sidebar-title"><b>Filter</b></h3>
                    <hr />

                    <form action="{{ route('products.searchSort') }}" method="get">
                        <div class="form-group">
                            <label for="minPrice">Min Price:</label>
                            <input type="number" class="form-control" id="minPrice" name="min_price" min="1"
                                placeholder="Enter Min Price" value="{{ request('min_price') }}" step="1">
                        </div>

                        <div class="form-group">
                            <label for="maxPrice">Max Price:</label>
                            <input type="number" class="form-control" id="maxPrice" name="max_price" min="1"
                                placeholder="Enter Max Price" value="{{ request('max_price') }}" step="1">
                        </div>

                        <button type="submit" class="btn btn-dark btn-md">Filter</button>
                    </form>



                </div>

                <div class="col-lg-9" style="padding-left: 30px;">




                    <div class="row">

                        <div class="mt-3" id="searchResults">
                            <div class="container">
                                <div class="row align-items-center">
                                    <p class="mb-0">
                                        @if (isset($searchQuery))
                                            Search results for: <strong>"{{ $searchQuery }}"</strong>
                                        @else
                                            Showing all products
                                        @endif
                                    </p>
                                    <button type="button" class="btn btn-secondary btn-sm mb-2 ml-3" id="resetButton"
                                        style="max-width: 100px;">Clear</button>
                                </div>
                            </div>
                        </div>














                        <form id="searchSortForm" action="{{ route('products.searchSort') }}" method="GET"
                            class="form-inline">
                            <div class="form-group">
                                <label for="search" class="sr-only">Search</label>
                                <input type="text" class="form-control" id="search" name="search"
                                    placeholder="Search" value="{{ request('search') }}">
                            </div>
                            <button type="submit" class="btn btn-secondary ml-2">Search</button>

                            <div class="form-group mx-2">
                                <label for="sort" class="sr-only">Sort</label>
                                <select class="form-control" id="sort" name="sort">
                                    <option value="" selected>Sort</option>
                                    <option value="desc">Sort Price(high-low)</option>
                                    <option value="asc">Sort Price(low-high)</option>
                                    <option value="latest">Sort Newest Product</option>
                                    <option value="oldest">Sort Oldest Product</option>
                                </select>
                            </div>

                            <div class="form-group mx-2">
                                <label class="mr-2">Type:</label>
                                <select class="form-control" id="foodType" name="food_type">
                                    <option value="" {{ request('food_type') === '' ? 'selected' : '' }}>All</option>
                                    <option value="veg" {{ request('food_type') === 'veg' ? 'selected' : '' }}>Veg
                                    </option>
                                    <option value="non-veg" {{ request('food_type') === 'nonVeg' ? 'selected' : '' }}>
                                        Non-Veg</option>
                                </select>
                            </div>



                            <input type="hidden" id="category" name="category" value="{{ request('category') }}">




                        </form>
                    </div>
                    <p class="text-right mt-4">Showing {{ $viewproducts->firstItem() }} - {{ $viewproducts->lastItem() }}
                        of {{ $viewproducts->total() }} results</p>



                    <script>
                        $('#sort, #foodType').change(function() {
                            $('#searchSortForm').submit();
                        });
                        $(document).ready(function() {
                            $('.category-link').click(function(e) {

                            });

                            function resetForm() {
                                $('#search, #sort, #category, #foodType').val('');

                                $('#searchSortForm').submit();
                            }

                            $('#resetButton').click(function() {
                                $('#resetButton').click(function() {
                                    $('#search').val('');
                                    $('#sort, #foodType').prop('selectedIndex', 0);
                                    $('#category').val('');
                                    $('#searchSortForm').submit();
                                });
                            });
                        });

                        $(document).ready(function() {
                            toggleShowingAllProducts();

                            $('#resetButton').click(function() {
                                $('#search').val('');
                                toggleShowingAllProducts();
                            });

                            function toggleShowingAllProducts() {
                                var hasSearchQuery = '{{ isset($searchQuery) }}';
                                if (hasSearchQuery) {
                                    $('#searchResults').show();
                                } else {
                                    $('#searchResults').hide();
                                }
                            }
                        });
                    </script>














                    <div class="row">

                        @forelse ($viewproducts as $product)
                            <div class="col-sm-3 col-md-2 col-lg-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <a href="#" data-toggle="modal"
                                            data-target="#productModal{{ $product->id }}">
                                            <img src="{{ asset('storage/' . $product->product_image) }}"
                                                class="product-image">
                                        </a>
                                        <h5 class="card-title"><b>{{ $product->name }}</b></h5>
                                        <p class="card-text small description-limit">{{ $product->description }}</p>
                                        <p class="price-tag"> Rs.{{ $product->price }}</p>

                                        <form action="{{ url('/addcart', $product->id) }}" method="post"
                                            class="add-to-cart-form">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <div class="input-group">
                                                <input type="number" name="quantity" value="1" min="1"
                                                    max="10" required class="form-control quantity-input">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-success">Add to Cart</button>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="productModalLabel{{ $product->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="productModalLabel{{ $product->id }}">
                                                {{ $product->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('storage/' . $product->product_image) }}"
                                                class="img-fluid" alt="Product Image">
                                            <p style="font-weight: 500">{{ $product->description }}</p>
                                            <p style="color: chocolate; font-weight: 800"">Price: Rs.{{ $product->price }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        @empty
                            <div class="col-12 text-center mt-5">
                                <p>No products found. Try searching another one</p>
                            </div>
                        @endforelse


                    </div>
                    <div class="d-flex justify-content-end">

                        <div class="pagination">
                            {{ $viewproducts->appends([
                                    'sort' => $sortOption,
                                    'search' => $searchQuery,
                                    'food_type' => $foodType,
                                    'category' => $categoryId,
                                ])->links('') }}


                        </div>
                    </div>






                </div>

            </div>
        </div>
    </section>
@endsection
