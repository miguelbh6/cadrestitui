<!DOCTYPE html>
<html lang="pt-br">
<?php require_once(__DIR__ . '../../fragments/head.php'); ?>

<body>
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-dark bg-dark">
                <a class="navbar-brand" href="<?=base_url(); ?>"> <img
                        src="<?=base_url(); ?>assets/img/favicon.ico" width="30" height="30"
                        class="d-inline-block align-top" alt=""> CNDN
                </a>
            </nav>
        </div>
    </div>
    <br>
    <div class="container">
        <?php require_once(__DIR__ . '../../fragments/alert.php'); ?>
        <?=$contents; ?>
    </div>

    <!--<footer>
	<div class="row">
	<div class="col-12">
		<nav class="navbar relative-bottom navbar-expand-sm navbar-dark bg-dark">
			<a class="navbar-brand" href="#"> <img
				src="<?=base_url(); ?>assets/img/favicon.ico" width="30"
				height="30" class="d-inline-block align-top" alt=""> CNDN
			</a>
		</nav>
	</div>
</div>
<?php require_once(__DIR__ . '../../fragments/footer.php'); ?>
</footer>-->
</body>

</html>