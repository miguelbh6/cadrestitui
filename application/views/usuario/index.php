<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="generator" content="Mobirise v4.8.1, mobirise.com">
<meta name="viewport"
	content="width=device-width, initial-scale=1, minimum-scale=1">
<link rel="shortcut icon"
	href="<?php echo base_url();?>assets/img/favicon.ico"
	type="image/x-icon">
<meta name="description" content="CNDN">
<title>CNDN</title>
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/css/bootstrap.min.css">
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/css/bootstrap-grid.min.css">
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/css/bootstrap-reboot.min.css">
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/css/jquery-ui.css">
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
	integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
	crossorigin="anonymous">
<script src="<?php echo base_url();?>assets/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.mask.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/css/sigin.css">
</head>
<body class="text-center">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<form class="form-signin" method="POST"
					action="<?php echo base_url(); ?>usuario/login">
					<?php  require_once( __DIR__. '../../fragments/alert.php'); ?>
					<img class="mb-4"
						src="<?php echo base_url();?>assets/img/favicon.ico" alt=""
						width="72" height="72">
					<h1 class="h3 mb-3 font-weight-normal">Por favor, entre</h1>
					<label for="inputEmail" class="sr-only">Usúario</label> <input
						type="text" name="user" class="form-control" placeholder="Usúario"
						required autofocus> <input type="password" name="password"
						class="form-control" placeholder="Password" required>
					<div class="checkbox mb-3">
						<label> <input type="checkbox" value="remember-me"> Lembrar-me
						</label>
					</div>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
				</form>
			</div>
		</div>
	</div>
</body>
<footer>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</footer>
</html>