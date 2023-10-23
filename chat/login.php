<!--
//login.php
!-->

<?php
include('database_connection.php');
session_start();
$message = '';
if (isset($_SESSION['user_id'])) {
	header('location:index.php');
}
if (isset($_POST['login'])) {
	$query = "
		SELECT * FROM login 
  		WHERE username = :username
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':username' => $_POST["username"]
		)
	);
	$count = $statement->rowCount();
	if ($count > 0) {
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			if (password_verify($_POST["password"], $row["password"])) {
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['username'] = $row['username'];
				$sub_query = "
				INSERT INTO login_details 
	     		(user_id) 
	     		VALUES ('" . $row['user_id'] . "')
				";
				$statement = $connect->prepare($sub_query);
				$statement->execute();
				$_SESSION['login_details_id'] = $connect->lastInsertId();
				header('location:index.php');
			} else {
				$message = '<label>Senha incorreta</label>';
			}
		}
	} else {
		
		$message = '<label>Senha incorreta</labe>';
	}
}
?>
<html>

<head>
	<title>AdoteAí</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/bootstrap-5/css/bootstrap.min.css">
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
						Login
					</span>

					<div class="row">
						<p class="text-danger"><?php echo $message; ?></p>

						<div class="row">
							<div class="col-lg-6" style="margin-left:3cm">
								<div class="p-t-31 p-b-9">
									<span class="txt1">
										<!-- <div class="form-group"> -->
										<label>E-mail</label>
									</span>
									<input type="text" name="username" class="form-control" required />
								</div>
							</div>


							<div class="col-lg-6" style="margin-left:3cm">
								<div class="p-t-31 p-b-9">
									<span class="txt1">
										<!-- <div class="form-group"> -->
										<label>Senha</label>
									</span>
									<input type="password" name="password" class="form-control" required />
								</div>
							</div>

							<div class="col-lg-6" style="margin-left:3cm">
								<div class="container-login100-form-btn m-t-17">
									<button class="login100-form-btn" type="submit" name="login" value="Login">
										Login </button>
								</div>
							</div>

							<div class="col-lg-3" style="margin-left:12.72cm">
								<div class="container-login100-form-btn m-t-10">
									<a href="../index.php" class="login100-form-btn">Voltar</a>

								</div>
							</div>

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="../assets/bootstrap-5/js/bootstrap.bundle.min.js"></script>

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