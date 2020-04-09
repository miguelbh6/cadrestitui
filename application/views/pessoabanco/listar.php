<div class="row">
	<div class="col-md-12 mb-3">
		<h3>Pessoas com cadastro bancarios</h3>
	</div>
</div>

<?php if (!empty($pessoas)) { ?>
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table-sm table-bordered">
					<thead class="table-dark">
						<tr>
							<th scope="col">CPF</th>
							<th scope="col">Banco</th>
							<th scope="col">Agencia</th>
							<th scope="col">Conta</th>
							<th scope="col">Valor total</th>
							<th scope="col">Acoes</th>
						</tr>
					</thead>
					<?php
					foreach ($pessoas as $it) :
					?>
						<td><?php echo $it->cpf ?></td>
						<td><?php echo $it->banco ?></td>
						<td><?php echo $it->agencia ?></td>
						<td><?php echo $it->conta ?></td>
						<td><?php echo $it->vl_total ?></td>
						<td style="width: 20%;" class="text-center"> <a href="#<?php echo $it->id; ?>" title="Apagar" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-<?php echo $it->id ?>"><i class="fas fa-trash-alt"></i> Apagar</span></a></td>
						</tr>

						<!-- Modal delete -->
						<div class="modal fade" id="delete-modal-<?php echo $it->id ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="modalLabel">Excluir Item</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">Deseja realmente excluir este item?</div>
									<div class="modal-footer">
										<a class="btn btn-primary" href="<?php echo base_url('pessoabanco/remover/' . $it->id) ?>">Sim</a>
										<button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</table>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="pagination">
						<b>Todal de Registros: <?php echo sizeof($pessoas); ?></b>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="row">
		<div class="col-md-12">
			<?php echo '<p>N�o existem registros</p>'; ?>
		</div>
	</div>
<?php } ?>