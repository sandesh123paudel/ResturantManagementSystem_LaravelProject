@extends('master')


@section('content')


<div class="container error-card">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <img class="error-image" src="images/err.png" alt="Error Image" height="200">
        
                <div class="card-header" style="color: red">404 Page Not Found</div>

                <div class="card-body">
                    <h1>Oops! Looks like you took a wrong turn.</h1>
                    <p>The requested page seems to be on vacation or maybe it's just shy. Don't worry, let's get you back on track.</p>
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection
