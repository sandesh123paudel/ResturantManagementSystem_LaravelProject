@extends('frontend.master')

@section('content')

<div class="container py-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-secondary text-white text-left">
                   <h4> Edit Profile</h4>
                </div>
            </div>
        </div>
        <section class="content">
            <!-- Default box -->
            <form action="{{url('updateprofile/'.$user->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="row text-left">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{$user->name}}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" class="form-control"
                                            placeholder="Email" value={{$user->email}}>
                                         @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            placeholder="Phone"  value={{$user->phone}}>
                                            @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror   
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="phone">Address</label>
                                        <textarea name="address" id="address" class="form-control" cols="30" rows="5" placeholder="Address">{{$user->address}}</textarea>
                                        @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                
        
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Password">
                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" placeholder="Confirm Password">
                                            @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
        
                              
        
        
                            </div>
                        </div>
                    </div>
                    <div class="pb-5 pt-3">
                        <button class="btn btn-secondary">Update</button>
                        <a href={{ url('my-profile') }} class="btn btn-outline-dark ml-3">Cancel</a>
                    </div>
                </div>
            </form>
            <!-- /.card -->
        </section>
    </div>

</div>
    
@endsection


<style>
    .mb-3 label {
        display: block;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }
</style>