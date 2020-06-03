<div class="row">
	<div class="title col-12 mb-3">
		<h4>
			Informe dados bancários para depósito de restituição</h4>
	</div>
</div>
<div class="row">
	<div class="col-1"></div>
	<div class="title col-11">
		<h7>
			<p class="text-danger"><strong>*SOMENTE SERÃO ACEITOS DADOS BANCÁRIOS DE MESMA TITULARIDADE DO SOLICITANTE</strong></p>
		</h7>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<form id="validation" action="<?php echo base_url(); ?>site/cadastrarDadosBancarios" method="post" accept-charset="utf-8" role="form">
			<div class="form-group">
				<label>Banco</label> <select name="banco" class="form-control" required>
					<option value="" selected>-- Selecione --</option>
					<?php foreach ($bancos as $i) { ?>
						<option value="<?php echo $i->id ?>"><?php echo '(' . $i->id . ') - ' . $i->nome; ?></option>
					<?php                            }                            ?>
				</select>
			</div>
			<div class="form-group">
				<input type="text" name="agencia" class="form-control" placeholder="Agência" required maxlength="10">
			</div>
			<label>Tipo de conta</label>
			<div class="form-group">

				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="tpconta" id="inlineRadio1" value="0" required>
					<label class="form-check-label" for="inlineRadio1">Corrente</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="tpconta" id="inlineRadio2" value="1" required>
					<label class="form-check-label" for="inlineRadio2">Poupança</label>
				</div>
			</div>
			<div class="form-group">
				<input type="text" name="conta" class="form-control" placeholder="Conta" required>
			</div>

			<div class="row text-center">
				<div class="col-1"></div>
				<div class="col-11 text-justify">
					<p><strong>
							Atenção, </br>você está finalizando seu cadastro em nossa base de pagamentos, na próxima tela
							você verá os valores a serem restituídos;
							</br>
							<p class="text-danger">OBS: FIQUE ATENTO A DATA DE PAGAMENTO SERÁ INFORMADA NA PAGINA INICIAL DO SINTE
								CNDN.COM.BR.</p></br>

						</strong></p>
				</div>
			</div>


			<div class="row text-center">
				<div class="col-6">
					<button type="button" class="btn btn-primary" onclick="window.location='<?= base_url('site/passo2') ?>'">
						<i class="fas fa-backward"></i> Voltar
					</button>
				</div>
				<div class="col-6">
					<button type="submit" id="btn_prosseguir" class="btn btn-primary">
						<i class="fas fa-forward"></i> Prosseguir
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="row text-center">
	<div class="col-12">
		<h6>Passo 3 de 4</h6>
	</div>
</div>
<script>
	$('input[name="agencia"]').mask("0#");
	$('input[name="conta"]').mask("0#");
</script>