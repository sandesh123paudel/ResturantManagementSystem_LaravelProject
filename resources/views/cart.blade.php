@extends('master')

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
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered m-0">
                            <thead>
                                <tr>
                                    <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details
                                    </th>
                                    <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                                    <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                                    <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                                    <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#"
                                            class="shop-tooltip float-none text-light" title=""
                                            data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $totalPrice = 0;
                                @endphp

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
                            <label class="text-muted font-weight-normal m-0">Total price</label>
                            <div class="text-large"><strong>Rs.{{ $totalPrice }}</strong></div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to
                            shopping</button>
                        <button type="button" class="btn btn-lg btn-primary mt-2">Checkout</button>
                    </div>


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
        border-radius: 10rem;
        -webkit-box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
        vertical-align: middle;
    }
</style>
