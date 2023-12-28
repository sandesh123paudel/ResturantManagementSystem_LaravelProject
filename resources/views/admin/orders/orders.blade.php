@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Orders</h1>
                </div>
                <div class="col-sm-6 text-right">
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group" style="width: 250px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Orders #</th>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Date Purchased</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td><a href="{{ route('admin.viewOrder', ['id' => $order->id]) }}">{{ $order->tracking_no }}</a></td>

                                    <td>{{ $order->fname }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->phone }}</td>

                                    <td>
                                        @if ($order->status == 0)
                                            <span class="badge bg-warning text-dark">Processing</span>
                                        @elseif ($order->status == 1)
                                            <span class="badge bg-success">Delivered</span>
                                        @elseif ($order->status == 2)
                                            <span class="badge bg-danger">Cancelled</span>
                                        @endif
                                    </td>
                                    


                                    <td>Rs.{{ $order->totalPrice }}</td>
                                    <td>{{ date('Y-m-d',strtotime($order->created_at)) }}</td>
                                    <td>
                                        <form action="{{ route('admin.updateStatus', ['order' => $order->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group">
                                                <select name="status" class="form-control form-control-sm">
                                                    <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Processing</option>
                                                    <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Delivered</option>
                                                    <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Cancelled</option>
                                                </select>
                                                
                                                
                                            </div>
                                            <button type="submit" class="btn btn-info btn-sm">Update Status</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
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
                            }, 2000); // 2000 milliseconds = 2 seconds
                        </script>
                    @endif
                    </table>
                    <div class="card-footer clearfix">
                        <div class="d-flex justify-content-end">
                            <div class="pagination">
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.card -->
    </section>
@endsection
