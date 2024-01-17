@extends('frontend.master')
 
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
        }, 2000); 
    </script>

    @endif

    @include('frontend.slider')


    @include('frontend.categories')


    @include('frontend.bestproducts')


@endsection

