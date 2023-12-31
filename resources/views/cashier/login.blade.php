<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cashier Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href={{ asset('"images/icons/favicon.ico"/') }}>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{ asset('"vendor/bootstrap/css/bootstrap.min.css"') }}>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{ asset("fonts/font-awesome-4.7.0/css/font-awesome.min.css") }}>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{ asset("vendor/animate/animate.css") }}>
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href={{ asset("vendor/css-hamburgers/hamburgers.min.css") }}>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{ asset("vendor/select2/select2.min.css") }}>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{ asset("css/util.css") }}>
	<link rel="stylesheet" type="text/css" href={{ asset("css/main.css") }}>
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src={{ asset("images/img-01.png") }} alt="IMG">
				</div>

				<form class="login100-form validate-form" action="{{ route('cashierLogin') }}" method="POST">
                    @csrf
					<span class="login100-form-title">
						Cashier Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
                

                <div class="text-center p-t-12">
                    <span class="txt1">
                        Forgot
                    </span>
                    <a class="txt2" href="#">
                        Username / Password?
                    </a>
                </div>

                <div class="container-login100-form-btn">
					<a style="background-color: #ffffff !important; border: 2px solid #57b846ff !important; color: #57b846ff !important;" class="login100-form-btn" href="/">
						Back To Admin Login
					</a>
				</div>

                <div class="text-center p-t-136"></div>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src={{ asset("vendor/jquery/jquery-3.2.1.min.js") }}></script>
<!--===============================================================================================-->
	<script src={{ asset("vendor/bootstrap/js/popper.js") }}></script>
	<script src={{ asset("vendor/bootstrap/js/bootstrap.min.js") }}></script>
<!--===============================================================================================-->
	<script src={{ asset("vendor/select2/select2.min.js") }}></script>
<!--===============================================================================================-->
	<script src={{ asset("vendor/tilt/tilt.jquery.min.js") }}></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src={{ asset("js/main.js") }}></script>

</body>
</html>