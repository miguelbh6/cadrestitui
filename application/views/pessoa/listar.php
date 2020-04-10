<div class="row">
	<div class="col-md-12 mb-3">
		<h3>Pessoas</h3>
	</div>
</div>
<?php if(!empty($pessoas)){?>
<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table-sm table-bordered">
				<thead class="table-dark">
					<tr>
						<th scope="col">Nome</th>
						<th scope="col">Sobrenome</th>
						<th scope="col">CPF</th>
						<th scope="col">Acoes</th>
					</tr>
				</thead>
                        <?php
    foreach ($pessoas as $it) :
        ?>
                            <tr>
					<td><?php echo $it->nome ?></td>
					<td><?php echo $it->sobrenome ?></td>
					<td><?php echo $it->cpf ?></td>
					<td style="width: 20%;" class="text-center"><a
						href="<?=base_url('pessoa/editar/' . $it->id) ?>"
						title="Editar cadastro" class="btn btn-primary"><i
							class="far fa-edit"></i> Editar</span></a> <a
						href="#<?=$it->id; ?>" title="Apagar"
						class="btn btn-danger" data-toggle="modal"
						data-target="#delete-modal-<?=$it->id ?>"><i
							class="fas fa-trash-alt"></i> Apagar</span></a></td>
				</tr>


				<!-- Modal delete -->
				<div class="modal fade" id="delete-modal-<?=$it->id ?>"
					tabindex="-1" role="dialog" aria-labelledby="modalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="modalLabel">Excluir Item</h4>
								<button type="button" class="close" data-dismiss="modal"
									aria-label="Fechar">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">Deseja realmente excluir este item?</div>
							<div class="modal-footer">
								<a class="btn btn-primary"
									href="<?=base_url('pessoa/remover/'. $it->id)?>">Sim</a>
								<button type="button" class="btn btn-default"
									data-dismiss="modal">N&atilde;o</button>
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
					<b>Todal de Registros: <?=sizeof($pessoas); ?></b>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } else{ ?>
<div class="row">
	<div class="col-md-12">
                <?php echo '<p>N�o existem registros</p>'; ?>
            </div>
</div>
<?php }?>
