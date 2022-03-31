<!DOCTYPE html>
<html lang="en">
<head>
	<title>UBI GPS || Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../Login_animated/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../Login_animated/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../Login_animated/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../Login_animated/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../Login_animated/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../Login_animated/css/util.css">
	<link rel="stylesheet" type="text/css" href="../../Login_animated/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../../dist/img/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form">
					<span class="login100-form-title">
						Registro de cuenta nueva
					</span>

          <div class="wrap-input100 validate-input" data-validate = "Campo obligatorio!">
						<input class="input100" type="text" name="nombreCuenta" placeholder="Nombre de compañia">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "se requiere un email valido! eje: empresa@hot.com">
						<input class="input100" type="text" name="email" placeholder="Correo electronico">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "la clave es requerida">
						<input class="input100" type="password" name="pass" placeholder="Clave">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
          <div class="wrap-input100 validate-input" data-validate = "Vuelva a ingresar la clave!">
						<input class="input100" type="password" name="rePass" placeholder="Repetir clave">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

          <div class="contact100-form-checkbox m-l-4" >
            <input class="input-checkbox100" type="checkbox" id="terminos" name="terminos" >
						<label  class="label-checkbox100" for="terminos">
							Acepto los

						<a class="txt2" href="#">
							terminos
						</a>
            </label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Registrar
						</button>
					</div><hr/>









					<div class="text-center txt2">
						<a class="txt2" href="../../../index.php">
							<strong>Ya poseo una cuenta</strong>
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="../../Login_animated/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../../Login_animated/vendor/bootstrap/js/popper.js"></script>
	<script src="../../Login_animated/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../../Login_animated/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../../Login_animated/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="../../Login_animated/js/main.js"></script>

</body>
</html>
