<div class="row">
    <div class="col-md-12 mb-3">
        <h3>Pessoas com cadastro bancarios</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <?php echo form_open('pessoabanco/pesquisar'); ?>
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="cpf_pesquisa" for="pesquisar" value="" class="form-control" placeholder="CPF ou CNPJ">
            </div>
            <div class="col-md-2 row">
                <select name="ind_pago_pesquisa" class="form-control">
					<option value="S" selected>Pago</option>
                    <option value="N" selected>A pagar</option>
                    <option value="" selected>Todos</option>
				</select>
            </div>
            <div class="col-md-2">
                <input type="text" name="dt_pago_pesquisa" class="form-control" placeholder="Data pagamento" maxlength="10">
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-success btn-block">Pesquisar <span class="glyphicon glyphicon-search" aria-hidden="true" /></button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<?php if (!empty($pessoas)) { ?>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">CPF</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Data cadastro</th>
                        <th scope="col">Banco</th>
                        <th scope="col">Agencia</th>
                        <th scope="col">Tipo de conta</th>
                        <th scope="col">Conta</th>
                        <th scope="col">Total</th>
                        <th scope="col">Data Pagamento</th>
                        <th class="text-center" scope="col">Acões</th>
                    </tr>
                </thead>
                <?php
					foreach ($pessoas as $it) :
					?>
                <td><?php 
                                    


                                    if(strlen($it->cpf) == 11){

$parte_um     = substr($it->cpf, 0, 3);
$parte_dois   = substr($it->cpf, 3, 3);
$parte_tres   = substr($it->cpf, 6, 3);
$parte_quatro = substr($it->cpf, 9, 2);

$monta_cpf = "$parte_um.$parte_dois.$parte_tres-$parte_quatro";
                                    
echo $monta_cpf; } else{
    $parte_um     = substr($it->cpf, 0, 2);
$parte_dois   = substr($it->cpf, 2, 3);
$parte_tres   = substr($it->cpf, 5, 3);
$parte_quatro = substr($it->cpf, 8, 4);
$parte_cinco = substr($it->cpf, 12, 2);

$monta_cpf = "$parte_um.$parte_dois.$parte_tres/$parte_quatro-$parte_cinco";
                                    
echo $monta_cpf;

}



?></td>
                <td><?=$it->nome ?></td>
                <td><?= date ("d/m/Y H:i:s",strtotime($it->dt_inclusao)); ?></td>
                <td><?=$it->banco ?></td>
                <td><?=$it->agencia ?></td>
                <td><?=$it->tpconta == '0' ? 'Corrente' : 'Poupança' ?></td>
                <td><?=$it->conta .'-' . $it->dv?></td>
                <td><?='R$' . number_format($it->vl_total, 2, ',', '.') ?></td>
                <td><?= !is_null($it->dt_pago) ? $it->dt_pago : '' ?></td>
                <td style="width: 20%;" class="text-center"> 
                <!--<a href="#<?=$it->id; ?>" title="Apagar"
                        class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-<?=$it->id ?>"><i
                            class="fas fa-trash-alt"></i> Apagar</span></a>-->
                            <a href="<?= base_url('pessoabanco/editar/' . $it->id) ?>" title="Editar" class="btn btn-primary"><i class="far fa-edit"></i>
                                            Editar</span></a>
                            <?php if ($it->ind_pago == '0' || is_null($it->ind_pago)) { ?>
                            <a href="<?= base_url('pessoabanco/pagar/' . $it->id) ?>" title="Pagamento" class="btn btn-success">
                            <i class="fas fa-hand-holding-usd"></i> Pagar</span></a>
                            <?php } else { ?>
                                <a href="<?= base_url('pessoabanco/desfazerpagamento/' . $it->id) ?>" title="Desfazer pagamento" class="btn btn-danger">
                            <i class="fas fa-hand-holding-usd"></i> Desfazer pagamento</span></a>
                            <?php }  ?>
                            </td>
                </tr>

                <!-- Modal delete -->
                <div class="modal fade" id="delete-modal-<?=$it->id ?>" tabindex="-1" role="dialog"
                    aria-labelledby="modalLabel">
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
                                <a class="btn btn-primary"
                                    href="<?=base_url('pessoabanco/remover/' . $it->id) ?>">Sim</a>
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
                    <b>Total de Registros: <?=sizeof($pessoas); ?></b>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
<div class="row">
    <div class="col-md-12">
        <?='<p>Não existem registros</p>'; ?>
    </div>
</div>
<?php } ?>