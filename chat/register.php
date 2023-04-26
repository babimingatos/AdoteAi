
<?php

include('database_connection.php');

session_start();

$message = '';

if (isset($_SESSION['user_id'])) {
	header('location:index.php');
}

if (isset($_POST["register"])) {
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	$check_query = "
	SELECT * FROM login 
	WHERE username = :username
	";
	$statement = $connect->prepare($check_query);
	$check_data = array(
		':username'	=>	$username
	);
	if ($statement->execute($check_data)) {
		if ($statement->rowCount() > 0) {
			$message .= '<p><label>Usuário já cadastrado</label></p>';
		} else {
			if (empty($username)) {
				$message .= '<p><label>Digite o usuário</label></p>';
			}
			if (empty($password)) {
				$message .= '<p><label>Digite a senha</label></p>';
			} else {
				if ($password != $_POST['confirm_password']) {
					$message .= '<p><label>Senhas não conferem</label></p>';
				}
			}
			if ($message == '') {
				$data = array(
					':username'		=>	$username,
					':password'		=>	password_hash($password, PASSWORD_DEFAULT)
				);

				$query = "
				INSERT INTO login 
				(username, password) 
				VALUES (:username, :password)
				";
				$statement = $connect->prepare($query);
				if ($statement->execute($data)) {
					$message = "<label>Cadastrado com sucesso</label>";
				}
			}
		}
	}
}

?>

<html>

<head>
	<title>Chat Application using PHP Ajax Jquery</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="icon" type="image/png" href="../assets/imgs/icons/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/main.css">
</head>

<body>
	<div class="limiter">

		<div class="container-login100" style="background-image: url('../assets/imgs/dogs.jpg');">
			<!-- <div class="container"> -->
			<br />

			<!-- <h3 align="center">AdoteAí</h3><br /> -->
			<br />
			<!-- <div class="panel panel-default">
		<div class="panel-heading">Faça seu login</div>
		<div class="panel-body"> -->

			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">



				<form method="post">

					<span class="login100-form-title p-b-53">
						Cadastre- se
					</span>


					<span class="text-danger"><?php echo $message; ?></span>
					<div class="row">
						<div class="col-lg-12">
							<div class="p-t-31 p-b-9">
								<span class="txt1" style="font-size:18px">
									<!-- <div class="form-group"> -->
									<label>Usuário</label>
								</span>
								<input type="text" style="font-size:18px"name="username" class="form-control" />
							</div>
						</div>


						





						<div class="col-lg-12">
							<div class="p-t-31 p-b-10">
								<span class="txt1" style=" font-size:18px">
									<!-- <div class="form-group"> -->
									<label>Senha</label>
								</span>
								<input type="password" style="font-size:18px" name="password" class="form-control" />
							</div>
						</div>




						<div class="col-lg-12">
							<div class="p-t-31 p-b-9">
								<span class="txt1" style=" font-size:18px">
								
									<label>Confirme a senha</label>
								</span>
								<input type="password" style="font-size:18px" name="confirm_password" class="form-control" />
							</div>
						</div>

						

						<div class="col-lg-3" style="margin-left:12.72cm; color:aliceblue">
							<div class="container-login100-form-btn m-t-10">
								<input type="submit" name="register" value="Register" class="login100-form-btn"/>
							</div>

						</div>
						<div align="center">
							<a style=" font-size:18px" href="login.php">Login</a>
						</div>



						<!-- <div class="form-group">
							<input type="submit" name="register" class="btn btn-info" value="Register" />
						</div> -->

				</form>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

	<script src="../assets/vendor/animsition/js/animsition.min.js"></script>
	<script src="../assets/vendor/bootstrap/js/popper.js"></script>
	<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/vendor/select2/select2.min.js"></script>
	<script src="../assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="../assets/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="../assets/vendor/countdowntime/countdowntime.js"></script>
	<script src="../assets/js/main.js"></script>
</body>

</html>