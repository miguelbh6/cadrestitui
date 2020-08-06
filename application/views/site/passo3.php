<!--   <br><br><br><br><br> -->
<div class="row">
	<div class="title col-12 mb-5">
		<h4> <?php
				echo $pessoa->nome . ', conforme determinação judicial, segue o valor a ser restituído, dê o <b>ACEITE</b> e em seguida clique em <b>FINALIZAR</b> para salvar seus dados';
				?>: </h4>
	</div>
</div>
<div class="row mb-5">
	<div class="col-12">
		<table class="table">
			<thead>
				<tr>
					<th style="text-align:center" scope="col">Grupo</th>
					<th style="text-align:center" scope="col">Cota</th>
					<th style="text-align:center" scope="col">Situação</th>
					<th style="text-align:center" scope="col">Valor a restituir</th>
					<th style="text-align:center" scope="col">Percentual a restituir 57,94%</th>
					<th style="text-align:center" scope="col">Pagamento após 21/01/2015</th>
				</tr>
			</thead>
			<?php foreach ($planilhas as $it) : ?>
				<tr>
					<td align="center"><?= $it->grupo ?></td>
					<td align="center"><?= $it->cota ?></td>
					<td align="center"><?= $it->situacao ?></td>
					<td align="center"><?= 'R$ ' . number_format(trim($it->valor_restituir), 2, ',', '.') ?></td>
					<td align="center"><?= $it->percentual_restituir ?></td>
					<td align="center"><?= 'R$ ' . number_format(trim($it->pagto), 2, ',', '.') ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>
<div class="row text-center mb-5">
	<div class="col-12">
		<h1>
			<?= 'Valor total é R$ ' . (isset($valrest) ? number_format($valrest, 2, ',', '.') : ''); ?></h1>
	</div>
</div>
<div class="row text-center mb-5">
	<div class="col-12">
		<form action="<?php echo base_url(); ?>site/aceiteFinal" method="post" accept-charset="utf-8" role="form">
			<input type="checkbox" class="form-check-input" id="aceite" name="aceite">
			<label class="form-check-label" for="aceite">Li e aceito os termos e condições. </label>

	</div>
</div>
<div class="row text-center mb-5">
	<div class="col-12">
		<strong>
			<p class="text-danger">SEM O ACEITE SEU CADASTRO SERÁ EXCLUIDO</p></br>

		</strong>
	</div>
</div>

<div class="row text-center mb-5">
	<div class="form-group col-12">
		<span class="input-group-btn"><button id="btnFim" type="submit" class="btn btn-primary">Finalizar</button></span>
	</div>
</div>
</form>
<br>
<div class="row text-center">
	<div class="col-12">
		<h6>Passo 4 de 4</h6>
	</div>
</div>
<script>
	$('#aceite').change(
		function() {
			if (this.checked) {
				$("#btnFim").prop("disabled", false);
			} else {
				$("#btnFim").prop("disabled", true);
			}
		});
</script>