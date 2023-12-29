@extends('frontend.master')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            @if (session('alert-type') == 'success')
            <div class="alert alert-success" id="success-alert">
                {{ session('message') }}
            </div>

            <script>
                setTimeout(function() {
                    var successAlert = document.getElementById('success-alert');
                    if (successAlert) {
                        successAlert.style.display = 'none';
                    }
                }, 2000); // 2000 milliseconds = 2 seconds
            </script>
        @endif
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h4>My Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-left">
                            <div class="form-group">
                                <label for="name" class="font-weight-bold">Name</label>
                                <div class="border p-2 rounded">{{ Auth::user()->name }}</div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="font-weight-bold">Email</label>
                                <div class="border p-2 rounded">{{ Auth::user()->email }}</div>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="font-weight-bold">Contact Number</label>
                                <div class="border p-2 rounded">{{ Auth::user()->phone }}</div>
                            </div>

                            <div class="form-group" >
                                <label for="address" class="font-weight-bold">Address</label>
                                <div class="border p-2 rounded">{{ Auth::user()->address }}</div>
                            </div>

                        </div>
                    </div>
                  
                    <a href="{{url('edit-profile/'.Auth::user()->id)}}" class="btn btn-secondary"  style="align-content: center">Edit Profile</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
