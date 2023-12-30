<div class="container">
    <h3 class="category-heading">Seasonal Specials </h3>
    <div class="row">
        @foreach ($viewproducts as $index => $product)
            <div class="col-sm-3 col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-body text-center">
                        <a href="#" data-toggle="modal" data-target="#productModal{{ $product->id }}">
                            <img src="{{ asset('storage/' . $product->product_image) }}" class="product-image">
                        </a>
                        <h5 class="card-title"><b>{{ $product->name }}</b></h5>
                        <p class="card-text small description-limit">{{ $product->description }}</p>
                        <p class="price-tag"> Rs.{{ $product->price }}</p>
                        <form action="{{url('/addcart',$product->id)}}" method="post" class="add-to-cart-form">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="input-group">
                                <input type="number" name="quantity" value="1" min="1" max="10" required class="form-control quantity-input">
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
                            <h5 class="modal-title" id="productModalLabel{{ $product->id }}">{{ $product->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           
                            <img src="{{ asset('storage/' . $product->product_image) }}" class="img-fluid"
                                alt="Product Image">
                            <p style="font-weight: 00">{{ $product->description }}</p>
                            <p style="color: chocolate; font-weight: 800"">Price: Rs.{{ $product->price }}</p>
                            <p style="color: {{ $product->item == 'veg' ? 'green' : 'red' }}; font-weight: 800;">Item:{{ $product->item }}</p>


                        </div>
                    </div>
                </div>
            </div>

            @if ($index == 7)
                <div class="col-12 text-center mt-4">
                    <p><a href="/menu" style="text-decoration: none; color: darkred; font-weight: 600">View More
                            Products.....</a></p>
                </div>
            @endif
        @endforeach
    </div>
</div>
