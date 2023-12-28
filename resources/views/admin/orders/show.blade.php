@extends('admin.layouts.app')

@section('content')

        <div class="card m-4">
            <div class="card-header">
                <h1>Order Details "{{ $order->tracking_no }}"</h1>
            </div>
            <div class="card-body">
                <table class="table">
                    
                    <tr>
                        <th>Customer:</th>
                        <td>{{ $order->fname }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $order->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone:</th>
                        <td>{{ $order->phone }}</td>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <td>
                            @if ($order->status == 0)
                                <span class="badge bg-warning text-dark">Processing</span>
                            @elseif ($order->status == 1)
                                <span class="badge bg-success">Delivered</span>
                            @elseif ($order->status == 2)
                                <span class="badge bg-danger">Cancelled</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Total:</th>
                        <td>Rs.{{ $order->totalPrice }}</td>
                    </tr>
                    <tr>
                        <th>Date Purchased:</th>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                    <!-- Add more details as needed -->

                    <tr>
                        <th colspan="3">Products in Order</th>
                    </tr>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                    @foreach($order->orderItems as $item)
                        <tr>
                            <td>
                                @if ($item->product)
                                    {{ $item->product->name }}
                                @else
                                    Product Not Found
                                @endif
                            </td>
                            <td>Rs.{{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                        </tr>
                    @endforeach
                </table>
                <div class="card-footer">
                    <p class="text-right" style="font-weight:700">Total Price: Rs {{$order->totalPrice}}</p>
                </div>
            </div>
        </div>
    
@endsection
