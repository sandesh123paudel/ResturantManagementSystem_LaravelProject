@extends('master')
 

@section('content')
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

@include('slider')


@include('categories')


@include('bestproducts')






@endsection

