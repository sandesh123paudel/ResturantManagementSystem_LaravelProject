@extends('frontend.master')

@section('content')
    <div class="container">
        <div class="container px-3 my-5 clearfix">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        @php
                            $cartCount = App\Helpers\CartHelper::CartCount();
                        @endphp
                        <h3 class="text-left mb-0">Shopping Cart</h3>
                    </div>
                    <div>
                        <p class="text-right mb-0">{{ $cartCount }} items</p>
                    </div>
                </div>
                @php
                    $totalPrice = 0;
                @endphp

                <div class="card-body">
                    @if (count($cartData) > 0)
                        <div class="table-responsive">
                            <table class="table table-hover  m-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp;
                                            Details
                                        </th>
                                        <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                                        <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                                        <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                                        <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a
                                                href="#" class="shop-tooltip float-none text-light" title=""
                                                data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody>






                                    @foreach ($cartData as $cartItem)
                                        <tr>
                                            <td class="p-4">
                                                <div class="media align-items-center">
                                                    <img src="{{ asset('storage/' . $cartItem->product_image) }}"
                                                        class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                                    <div class="media-body">
                                                        <a class="d-block text-dark">{{ $cartItem->name }}</a>
                                                        <small>{{ $cartItem->description }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right font-weight-semibold align-middle p-4">
                                                Rs.{{ $cartItem->price }}</td>
                                            <td class="text-center font-weight-semibold align-middle p-4">
                                                {{ $cartItem->quantity }}</td>
                                            <td class="text-right font-weight-semibold align-middle p-4">
                                                Rs.{{ $cartItem->price * $cartItem->quantity }}</td>
                                            <td class="text-center align-middle px-2">
                                                <a href="{{ url('/remove', $cartItem->id) }}"
                                                    class="shop-tooltip close float-none text-danger" title=""
                                                    data-original-title="Remove">×</a>
                                            </td>
                                        </tr>

                                        @php
                                            $totalPrice += $cartItem->price * $cartItem->quantity;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-end">
                            <div class="text-right mt-4 mr-3">
                                <label class="text-muted font-weight-normal mr-2">Total price</label>
                                <div class="text-large"><strong>Rs.{{ $totalPrice }}</strong></div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ url('menu') }}" class="btn btn-sm btn-secondary mt-2 mr-2">Continue Ordering</a>
                            <a href="{{ url('checkout') }}"
                                class="btn btn-sm btn-success ml-3 mt-2 @if ($totalPrice === 0) disabled @endif">Checkout</a>
                        </div>
                    @else
                        <div class="alert alert-info text-center mt-4" role="alert">
                            Your cart is empty. Start adding items <a style="text-decoration: none"
                                href="{{ url('menu') }}">here</a>.
                        </div>
                    @endif




                    
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    body {
        margin-top: 20px;
        background: #eee;
    }

    .ui-w-40 {
        width: 40px !important;
        height: auto;
    }

    .card {
        box-shadow: 0 1px 15px 1px rgba(52, 40, 104, .08);
    }

    .ui-product-color {
        display: inline-block;
        overflow: hidden;
        margin: .144em;
        width: .875rem;
        height: .875rem;
        border-radius: 20rem;
        -webkit-box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
        vertical-align: middle;
    }
</style>
