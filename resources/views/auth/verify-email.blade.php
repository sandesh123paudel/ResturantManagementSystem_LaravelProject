<!DOCTYPE html>
<html lang="en">

<head>
    <title>Verify-Email</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/main.css') }}">
    <style>
        .flex-btn-container {
            display: flex;
            justify-content: space-between;
        }
    </style>
    




    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title"
                    style="background-image: url(https://res.cloudinary.com/grubhub/image/upload/d_search:browse-images:default.jpg/w_267,q_80,fl_lossy,dpr_2.0,c_fill,f_auto,h_132/wzzsttf9irlleysk6ym4);">
                    <img src="{{ asset('images/logowhite.svg') }}" alt="Restaurant Logo" class="restaurant-logo">

                    <span class="login100-form-title-1">
                       Email Verification
                    </span>
                </div>
                <div class="card m-3">
                    <p class="text-gray-600 text-center mt-2"
                        style="font-size: 18;font-style: normal;font-weight:800px">
                        Thanks for signing up! Before getting started, could you verify your email address by clicking
                        on the link we just emailed to you?
                        If you didn\'t receive the email, we will gladly send you another.
                    </p>

                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="m-4 font-medium text-sm text-green-600" style="color: chocolate">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <div class="m-4 flex items-center justify-between flex-btn-container">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn">
                                Resend Verification Email
                            </button>
                        </div>
                    </form>
                
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn">
                                Log Out
                            </button>
                        </div>
                    </form>
                </div>
                

            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="{{ asset('auth/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('auth/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('auth/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('auth/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('auth/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('auth/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('auth/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('auth/vendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('auth/js/main.js"></script>
    



</body>

</html>
