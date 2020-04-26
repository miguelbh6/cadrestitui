<script type="text/javascript">
	$(function() {
		$('input[name="cep"]').blur(function() {
			var cep = $(this).val().replace(/[^0-9]/, '');
			$.post('consulta', {
					cep: cep
				},
				function(dados) {
					$('#rua').val(dados.logradouro);
					$('#bairro').val(dados.bairro);
					$('#cidade').val(dados.localidade);
					$('#estado').val(dados.uf);
				//	$('#rua').attr('readonly', true); 
				//	$('#bairro').attr('readonly', true); 
					$('#cidade').attr('readonly', true); 
					$('#estado').attr('readonly', true); 
				}, 'json');
		});
	});
</script>
<div class="row mb-3">
	<div class="col-12">
		<h4>Dados pessoais</h4>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<form id="validation" action="<?=base_url(); ?>site/cadastrarPessoa" method="post" accept-charset="utf-8" role="form">
			<div class="form-group">
				<input type="text" name="nome" class="form-control" placeholder="Nome" required>
			</div>
			<div class="form-group">
				<input type="text" name="sobrenome" class="form-control" placeholder="Sobrenome" required>
			</div>
			<div class="form-group">
				<input type="text" name="cpf" class="form-control" placeholder="CPF" required value="<?php echo (isset($cpf) ? $cpf : ''); ?>" readonly>
			</div>
			<div class="form-group">
				<input type="text" name="dtnasc" class="form-control" placeholder="Data Nascimento" required maxlength="10">
			</div>
			<div class="form-group">
				<input type="text" name="tel1" class="form-control" placeholder="Telefone 1" required maxlength="13">
			</div>
			<div class="form-group">
				<input type="text" name="tel2" class="form-control" placeholder="Telefone 2" maxlength="13">
			</div>
			<div class="form-group">
				<input type="email" name="email" class="form-control" placeholder="E-mail" required maxlength="100">
			</div>
			<div class="form-group">
				<input type="text" id="cep" name="cep" class="form-control" placeholder="CEP" required maxlength="9">
			</div>
			<div class="form-group">
				<input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade" required maxlength="255">
			</div>
			<div class="form-group">
				<input type="text" name="rua" id="rua" class="form-control" placeholder="Rua" required maxlength="255">
			</div>
			<div class="form-group">
				<input type="text" name="numero" id="numero" class="form-control" placeholder="Número" required maxlength="255">
			</div>
			<div class="form-group">
				<input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro" required maxlength="255">
			</div>
			<div class="form-group">
				<input type="text" name="uf" id="estado" class="form-control" placeholder="Estado" required maxlength="255">
			</div>
			<div class="row">
				<div class="col-6 mb-3">
					<span class="input-group-btn"><button type="submit" class="btn btn-primary">
							<i class="fas fa-save"></i> Cadastrar
						</button></span>
				</div>
				<div class="col-6 mb-3">
					<button type="button" class="btn btn-primary" onclick="window.location='<?=base_url('site/passo1') ?>'">
						<i class="fas fa-backward"></i> Voltar
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	$('input[name="cpf"]').mask("000.000.000-00");
	$('input[name="dtnasc"]').mask("##/##/####");
	$('input[name="tel1"]').mask("## #####-####");
	$('input[name="tel2"]').mask("## #####-####");
	$('input[name="cep"]').mask("#####-###");
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
	$('input[name="dtnasc"]').datepicker();
	$('input[name="numero"]').mask("0#");
</script>