
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset-Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('auth/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('auth/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('auth/css/main.css')}}">




<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(https://res.cloudinary.com/grubhub/image/upload/d_search:browse-images:default.jpg/w_267,q_80,fl_lossy,dpr_2.0,c_fill,f_auto,h_132/wzzsttf9irlleysk6ym4);">
                    <img src="{{asset('images/logowhite.svg')}}" alt="Restaurant Logo" class="restaurant-logo">

					<span class="login100-form-title-1">
						Reset Your Password
					</span>
				</div>
                <div class="card m-3">
                <p class="text-gray-600 text-center mt-2" style="font-size: 18;font-style: normal;font-weight:800px">Please Re Enter Password To Reset</p>

                </div>

               

				<form class="login100-form validate-form" method="POST" action="{{ route('password.store') }}">
                    @csrf


                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Enter Email" required autofocus autocomplete="email" value="{{old('email',$request->email)}}">
						<span class="focus-input100"></span>
    
					</div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror


                    <div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter Password" required autofocus autocomplete="password">
						<span class="focus-input100"></span>
    
					</div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror


                    <div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Confirm Password</span>
						<input class="input100" type="password" name="password_confirmation" placeholder="Enter Confirm Password" required autofocus autocomplete="password">
						<span class="focus-input100"></span>
    
					</div>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

					

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Reset Password
						</button>
					</div>

                
                    
                    
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="{{asset('auth/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('auth/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('auth/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('auth/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('auth/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('auth/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('auth/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('auth/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('auth/js/main.js"></script>

    

</body>
</html>


