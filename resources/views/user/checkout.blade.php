@extends('frontend.master')

@section('content')
    <div class="container mt-3">

        @if (count($cartItems) > 0)
            <form action="{{ url('place-order') }}" method="POST">

                @csrf
                <div class="row">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <p style="text-align: left; font-size: 25px;font-weight: 600">
                                    Basic Details
                                <p>
                                    <hr>
                                <div class="row checkout-form" style="text-align: left">
                                    <div class="col-md-6">
                                        <label for="firstName">First Name</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->name }}"
                                            name="fname" placeholder="Enter First name">
                                        @error('fname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->lname }}"
                                            name="lname" placeholder="Enter Last name">
                                        @error('lname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" value="{{ Auth::user()->email }}"
                                            name="email" placeholder="Enter Email">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <label for="phonefirstName">Phone Number</label>
                                        <input type="text" min="1" class="form-control"
                                            value="{{ Auth::user()->phone }}" name="phone"
                                            placeholder="Enter Phone Number">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->address }}"
                                            name="address" placeholder="Enter Address">
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>




                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <H6>Order Details</H6>
                                <hr>


                                <table class="table table-striped table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalPrice = 0;
                                        @endphp
                                        @foreach ($cartItems as $item)
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>Rs.{{ $item->products->price }}</td>
                                                <td>Rs.{{ $item->quantity * $item->products->price }}</td>

                                            </tr>
                                            @php
                                                $totalPrice += $item->products->price * $item->quantity;
                                            @endphp
                                        @endforeach


                                    </tbody>


                                </table>
                                <input type="hidden" name="totalPrice" value="{{ $totalPrice }}">

                                <div class="d-flex justify-content-end">
                                    <div class="text-right mt-4">
                                        <label class="text-muted font-weight-normal ">Total Price</label>
                                        <div class="text-large"><strong>Rs.{{ $totalPrice }}</strong></div>
                                    </div>
                                </div>

                                <hr>
                            </div>
                            <h4  class="ml-3" style="text-align: start;">Payment Options</h4>

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="payment" id="cashOnDelivery" value="cash_on_delivery" onchange="enablePlaceOrderButton()"> Cash On Delivery
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="payment" id="paypal" value="paypal" onchange="enablePlaceOrderButton()"> PayPal
                                </label>
                            </div>
            
                            <button class="btn btn-secondary order-placed" id="placeOrderButton" disabled>Place Order</button>
                           

                        </div>
                    </div>
                </div>
            </form>
            
        @else
            <div class="alert alert-warning mt-4" role="alert">
                Nothing to checkout. Your cart is empty.
            </div>
        @endif
    </div>

@endsection


<script>
    function enablePlaceOrderButton() {
        var cashOnDelivery = document.getElementById('cashOnDelivery').checked;
        var paypal = document.getElementById('paypal').checked;
        var placeOrderButton = document.getElementById('placeOrderButton');

        // Enable the button only if one of the radio buttons is selected
        placeOrderButton.disabled = !(cashOnDelivery || paypal);


    }


</script>
<style>
    .checkout-form {
        font-size: 17px;
        font-weight: 700
    }

    .checkout-form input {
        font-size: 14px;
        padding: 5px;
        font-weight: 400;
    }
    .form-check {
        text-align: start;
        margin-bottom: 10px;
        margin-left: 20px;

    }
</style>
