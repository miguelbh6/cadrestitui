<div class="row">
    <div class="col-md-12 mb-3">
        <h3>Pessoas</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <?php echo form_open('planilha/pesquisar'); ?>
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="cpf_pesquisa" for="pesquisar" value="" class="form-control" placeholder="CPF ou CNPJ">
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-success btn-block">Pesquisar <span class="glyphicon glyphicon-search" aria-hidden="true" /></button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<div class="row">
        <div class="col-md-12 mb-3">
            <a href="<?php echo base_url('planilha/editar'); ?>" class="btn btn-success margin-button15"><i class="fas fa-plus-circle"></i> Novo</a>
        </div>
    </div>

        <?php if (!empty($planilhas)) { ?>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">CPF</th>
                                    <th scope="col">Grupo</th>
                                    <th scope="col">Cota</th>
                                    <th scope="col">Situação</th>
                                    <th scope="col">Valor a restituir</th>
                                    <th scope="col">Percentual a restituir</th>
                                    <th scope="col">Pago</th>
                                    <th class="text-center" scope="col">Acões</th>
                                </tr>
                            </thead>
                            <?php
                            foreach ($planilhas as $it) :
                            ?>
                                <tr>
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

                                    <td><?= $it->grupo; ?></td>
                                    <td><?= $it->cota; ?></td>
                                    <td><?= $it->situacao; ?></td>
                                    <td><?= $it->valor_restituir; ?></td>
                                    <td><?= $it->percentual_restituir; ?></td>
                                    <td><?=$it->pagto == '0' ? 'Não' : 'Sim' ?></td>

                                    <td style="width: 30%;" class="text-center"><a href="<?= base_url('planilha/editar/' . $it->cpf) ?>" title="Editar cadastro" class="btn btn-primary"><i class="far fa-edit"></i>
                                            Editar</span></a> <a href="#<?= $it->cpf; ?>" title="Apagar" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-<?= $it->cpf ?>"><i class="fas fa-trash-alt"></i> Apagar</span></a>
                                          
                                        
                                    </td>
                                </tr>

                                  <!-- Modal delete -->
                                  <div class="modal fade" id="delete-modal-<?= $it->cpf ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
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
                                                <a class="btn btn-primary" href="<?= base_url('planilha/remover/' . $it->cpf) ?>">Sim</a>
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
                                <b>Total de Registros: <?= sizeof($planilhas); ?></b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="row">
                <div class="col-md-12">
                    <?= '<p>Não existem registros</p>'; ?>
                </div>
            </div>
        <?php } ?>

     