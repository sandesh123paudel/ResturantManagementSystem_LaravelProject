@extends('home')

@section('content')
<div class="custom-login">
    <div class="user-entry">
        <div class="col-sm-3 offset-sm-5">
            <h1>Welcome back!</h1>
            <h2>Enjoy foodies!!</h2>
            <form action="login" method="POST">
                @csrf

                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  <small id="passwordHelp" class="form-text text-muted">Please create a strong password.</small>

                </div>
                <button type="submit" class="btn btn-secondary center-btn">Login</button>
              </form>
        </div>
    </div>
</div>

@endsection