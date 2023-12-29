@extends('frontend.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-left">
                    <h4 class="ml-4">My Orders</h4>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Tracking Id</th>
                                <th>Total Price</th>
                                <th>Ordered Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $index=> $order)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td><a href="{{ url('view-order/'.$order->id) }}">{{ $order->tracking_no }}</a></td>
                                    
                                    <td>Rs.{{ $order->totalPrice }}</td>
                                    <td>{{ date('Y-m-d',strtotime($order->created_at)) }}</td>

                                    <td>
                                        @if ($order->status == 0)
                                            <span class="badge bg-warning text-dark">Processing</span>
                                        @elseif ($order->status == 1)
                                            <span class="badge bg-success">Delivered</span>
                                        @elseif ($order->status == 2)
                                            <span class="badge bg-danger">Cancelled</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('view-order/'.$order->id) }}" class="btn btn-info btn-sm">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
