<!DOCTYPE html>
<html>
<head>
<?php  require_once( __DIR__. '../../fragments/head.php'); ?>
</head>
<body>
	<div class="row">
		<div class="col-12">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<a class="navbar-brand" href="<?=base_url();?>"> <img
					src="<?=base_url();?>assets/img/favicon.ico" width="30"
					height="30" class="d-inline-block align-top" alt=""> CNDN
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active"><a class="nav-link"
							href="<?=base_url('pessoa');?>">Pessoas cadastradas<span
								class="sr-only">(current)</span></a></li>
						<li class="nav-item"><a class="nav-link"
							href="<?=base_url('pessoabanco');?>">Pessoas com cadastros bancários</a></li>
					</ul>
				</div>
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link disabled" href="#"> <i
							class="fas fa-user"></i> <?php    echo 'Usuario: ' . $this->session->userdata("username");?>
            </a></li>
					<li class="nav-item"><a class="btn navbar-btn btn-light"
						href="<?=base_url('usuario/logout');?>"><i
							class="fas fa-sign-out-alt"></i> Sair</a></li>
				</ul>
			</nav>
		</div>
	</div>
	<br>
	<div class="container-fluid">	   
	<?php  require_once( __DIR__. '../../fragments/alert.php'); ?>
	<?php echo $contents; ?>
	   </div>
</body><!--
<footer>
	<div class="row">
		<div class="col-12">
			<nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark">
				<a class="navbar-brand" href="#"> <img
					src="<?=base_url();?>assets/img/favicon.ico" width="30"
					height="30" class="d-inline-block align-top" alt=""> CNDN
				</a>
			</nav>
		</div>
	</div>
 <?php  require_once( __DIR__. '../../fragments/footer.php'); ?> 
</footer>-->
</html>