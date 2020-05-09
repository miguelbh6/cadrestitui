<!--   <br><br><br><br><br> -->
<div class="row">
	<div class="title col-12 mb-5">
		<h4> <?php
echo $pessoa->nome . ', confira seu valor a ser restituído, caso esteja correto clique no botão Prosseguir';
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
			<?php foreach ($planilhas as $it): ?>
				<tr>
					<td align="center"><?=$it->grupo?></td>
					<td align="center"><?=$it->cota?></td>
					<td align="center"><?=$it->situacao?></td>
					<td align="center"><?='R$ ' . $it->valor_restituir?></td>
					<td align="center"><?=$it->percentual_restituir?></td>
					<td align="center"><?='R$ ' . $it->pagto?></td>
				</tr>
			<?php endforeach;?>
		</table>
	</div>
</div>
<div class="row text-center mb-5">
	<div class="col-12">
		<h1>
			<?='Valor total é R$ ' . (isset($valrest) ? number_format($valrest, 2, ',', '.') : '');?></h1>
	</div>
</div>
<div class="row text-center mb-5">
	<div class="col-12">
		<input type="checkbox" class="form-check-input" id="aceite">
		<label class="form-check-label" for="aceite">Li e aceito os termos e condições. </label>
	</div>
</div>
<div class="row text-center">
	<div class="col-6">
		<button type="button" class="btn btn-primary" onclick="window.location='<?=base_url('site/passo2')?>'">
			<i class="fas fa-backward"></i> Voltar
		</button>
	</div>
	<div class="col-6">
		<button type="button" id="btn_prosseguir" class="btn btn-primary" onclick="window.location='<?=base_url()?>site/passo4'" disabled>
			<i class="fas fa-forward"></i> Prosseguir
		</button>
	</div>
</div>
<br>
<div class="row text-center">
	<div class="col-12">
		<h6>Passo 3 de 4</h6>
	</div>
</div>
<script>
$('#aceite').change(
    function(){
        if (this.checked) {
            $("#btn_prosseguir").prop("disabled", false);
        }else{
			$("#btn_prosseguir").prop("disabled", true);
		}
    });
</script>