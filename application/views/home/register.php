<!DOCTYPE html>
<html lang="en">

<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/template_login/') ?>vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/template_login/') ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/template_login/') ?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/template_login/') ?>vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/template_login/') ?>vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/template_login/') ?>vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/template_login/') ?>vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/template_login/') ?>vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/template_login/') ?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/template_login/') ?>css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="POST" action="<?= base_url('home/register_url') ?>">
					<span class="login100-form-title p-b-32">
						Register Account
					</span>

					<span class="txt1 p-b-11">
						Name
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate="name is required">
						<input class="input100" autocomplete="none" type="text" name="name">
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Username
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate="Username is required">
						<input class="input100" autocomplete="none" type="text" name="username">
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate="Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-48">
						<div>
							<a href="<?= base_url('home/index') ?>" class="txt3">
								Back to <strong>landing page</strong>
							</a>
						</div>

						<div>
							<a href="<?= base_url('home/login') ?>" class="txt3">
								I Have Account <strong>Login Here</strong>
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="<?= base_url('assets/template_login/') ?>vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/template_login/') ?>vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/template_login/') ?>vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url('assets/template_login/') ?>vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/template_login/') ?>vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/template_login/') ?>vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/template_login/') ?>vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/template_login/') ?>js/main.js"></script>

</body>

</html>