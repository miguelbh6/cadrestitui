<div class="row">
	<div class="title col-12 mb-3">
		<h4>
			Informe dados bancários para depósito de restituição</h4>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<form id="validation" action="<?php echo base_url(); ?>site/cadastrarDadosBancarios" method="post" accept-charset="utf-8" role="form">
			<div class="form-group">
				<label>Banco</label> <select name="banco" class="form-control" required>
					<option value="" selected>-- Selecione --</option>
					<?php foreach ($bancos as $i) {?>
						<option value="<?php echo $i->id ?>"><?php echo '(' . $i->id . ') - ' . $i->nome; ?></option>
					<?php }?>
				</select>
			</div>
			<div class="form-group">
				<input type="text" name="agencia" class="form-control" placeholder="Agência" required maxlength="10">
			</div>
			<div class="form-group">
				<input type="text" name="conta" class="form-control" placeholder="Conta" required>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Finalizar</button>
			</div>
		</form>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<h6>Passo 4 de 4</h6>
	</div>
</div>
<script>
	$('input[name="agencia"]').mask("0#");
	$('input[name="conta"]').mask("0#");
</script>