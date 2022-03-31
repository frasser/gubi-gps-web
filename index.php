<?php
include ('controladores/procesos.php');
/*if (isset ($_POST['login'])){
$usu=$_POST['user'];
$clave=$_POST['pass'];

//echo "usuario : " .$usu. "clave : " .$clave ;
login($usu, $clave);
}*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>GUBI GPS || Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vista/Login_animated/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vista/Login_animated/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vista/Login_animated/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vista/Login_animated/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vista/Login_animated/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vista/Login_animated/css/util.css">
	<link rel="stylesheet" type="text/css" href="vista/Login_animated/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="vista/dist/img/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" role="form" name="frmRegistro" method="post">
					<span class="login100-form-title">
						Inicia sesion
					</span>

					<div class="wrap-input100 validate-input" data-validate = "se requiere un email valido: ex@abc.xyz">
						<input class="input100" type="text" name="user" id="user" placeholder="Usuario o email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "la clave es requerida">
						<input class="input100" type="password" name="pass" id="pass" placeholder="Contraseña">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="button" name="login" id="login">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Olvidaste tu
						</span>
						<a class="txt2" href="#">
							Usuario / Clave?
						</a>
					</div><hr/>

					<div class="text-center txt2" >
						<span >
							O inicia sesion utilizando :
						</span>
					</div>

					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div><hr/>





					<div class="text-center txt2">
						<a class="txt2" href="vista/pages/formularios/registro.php">
							<strong>Crear una cuenta nueva</strong>
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vista/Login_animated/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
	<script src="vista/bower_components/jquery/dist/jquery.min.js"></script>
<!--===============================================================================================-->
	<script src="vista/Login_animated/vendor/bootstrap/js/popper.js"></script>
	<script src="vista/Login_animated/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vista/Login_animated/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vista/Login_animated/vendor/tilt/tilt.jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})

		$(document).ready(function(){
			$('#login').click(function(){

				var user = $('#user').val();
				var pass = $('#pass').val();
			//	$("#login").attr('value', 'Save'); //versions older than 1.6
				//$("#login").prop('value', 'Save'); //versions newer than 1.6
				//$("#login").html('Save');
				if ($.trim(user).length == 0  && $.trim(pass).length > 0) {
					swal('nombre de usuario o email requerido!!', {
					buttons: false,
					icon: "warning",
					closeOnClickOutside: false,
					timer: 2000,
					});
					$('[name="pass"]').val('');
					//$('[name="user"]').val('');

				}
				if ($.trim(user).length > 0  && $.trim(pass).length == 0) {
					swal('constraseña requerida!!', {
					buttons: false,
					icon: "warning",
					closeOnClickOutside: false,
					timer: 2000,
					});
         $('[name="user"]').val('');
				}

				if ($.trim(user).length > 0  && $.trim(pass).length > 0) {

					$.ajax({
						url:"controladores/procesos.php",
						method:"POST",
						data:{user:user, pass:pass},
						cache:"false",
						beforeSend:function(){
						$("#login").html('Conectando...');
						},
						success: function(data){
							setTimeout(function(){
              $("#login").html('LOGIN');
						}, 3000);

							if (data == "1") {
								swal('Bienvenido!! ' + user , {
								buttons: false,
								icon: "success",
								closeOnClickOutside: false,
								timer: 3000,
								});
								setTimeout(function(){
								$(location).attr('href','principal.php');
							}, 2600);

							}else {
								swal('las credenciales son incorrectas!!', {
								buttons: false,
								icon: "warning",
								closeOnClickOutside: false,
								timer: 3000,
								});
								$('[name="pass"]').val('');
								$('[name="user"]').val('');
								// user.value = "";
								// pass.value = "";
							}
						}

					});

				}
			});
		});
	</script>
<!--===============================================================================================-->
	<script src="vista/Login_animated/js/main.js"></script>

</body>
</html>
