<?php require_once(__DIR__ . '../../fragments/alert.php'); ?>
<div class="row">
	<div class="col-12">
		<h4>
			Cadastro bancários</h4>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<form id="validation" action="<?php echo base_url(); ?>pessoabanco/cadastrar" method="post" accept-charset="utf-8" role="form">
			<div class="form-group">
				<label>Banco</label> <select name="banco" class="form-control" required>
					<option value="" selected>-- Selecione --</option>
					<?php foreach ($bancos as $i) { ?>
						<option value="<?php echo $i->id ?>" <?= $i->id == $pessoabanco->banco ?' selected' : '' ?> ><?php echo '(' . $i->id . ') - ' . $i->nome; ?></option>
					<?php                            }                            ?>
				</select>
			</div>
			<div class="form-group">
				<input type="text" name="agencia" class="form-control" placeholder="Agência" required maxlength="10" value="<?= (isset($pessoabanco) ? $pessoabanco->agencia : '') ?>">
			</div>
			<label>Tipo de conta</label>
			<div class="form-group">

				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="tpconta" id="inlineRadio1" <?= $pessoabanco->tpconta == '0' ?' checked' : '' ?> value="0" required>
					<label class="form-check-label" for="inlineRadio1">Corrente</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="tpconta" id="inlineRadio2" <?= $pessoabanco->tpconta == '1' ?' checked' : '' ?> value="1" required>
					<label class="form-check-label" for="inlineRadio2">Poupança</label>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-3">
					<input type="text" name="conta" class="form-control" placeholder="Conta" required value="<?= (isset($pessoabanco) ? $pessoabanco->conta : '') ?>">
				</div>
				<div class="col-1">
					<input type="text" name="dv" class="form-control" placeholder="DV" required maxlength="1" size="1" value="<?= (isset($pessoabanco) ? $pessoabanco->dv : '') ?>">
				</div>
			</div>
			<label>Data pagamento</label>
						<div class="row">
                <div class="col-12 mb-3">
                    <input type="text" name="dt_pago" class="form-control" placeholder="Data pagamento" required
                        maxlength="10" value="<?php echo (isset($pessoabanco) ? $pessoabanco->dt_pago : '') ?>">
                </div>
            </div>
			<div class="row">
                <div class="col-6 mb-3">
                    <input type="hidden" name="id" value="<?=(isset($pessoabanco) ? $pessoabanco->id : '') ?>">
                    <span class="input-group-btn"><button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Salvar
                        </button></span>
                </div>
            </div>
		</form>
	</div>
</div>
<script>
	$('input[name="dt_pago"]').mask("##/##/####");
	jQuery(function($) {
		$.datepicker.regional['pt-BR'] = {
			closeText: 'Fechar',
			prevText: '&#x3c;Anterior',
			nextText: 'Pr&oacute;ximo&#x3e;',
			currentText: 'Hoje',
			monthNames: ['Janeiro', 'Fevereiro', 'Mar&ccedil;o', 'Abril', 'Maio', 'Junho',
				'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
			],
			monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
				'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'
			],
			dayNames: ['Domingo', 'Segunda-feira', 'Ter&ccedil;a-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sabado'],
			dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
			dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
			weekHeader: 'Sm',
			dateFormat: 'dd/mm/yy',
			firstDay: 0,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''
		};
		$.datepicker.setDefaults($.datepicker.regional['pt-BR']);
	});
	$('input[name="dt_pago"]').datepicker();
	</script>