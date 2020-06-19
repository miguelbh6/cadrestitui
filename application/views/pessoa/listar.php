<div class="row">
    <div class="col-md-12 mb-3">
        <h3>Pessoas</h3>
    </div>
</div>
<?php if (!empty($pessoas)) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Aceite</th>
                            <th class="text-center" scope="col">Acões</th>
                        </tr>
                    </thead>
                    <?php
                        foreach ($pessoas as $it) :
                    ?>
                        <tr>
                            <td><?= $it->nome ?></td>
                            <td><?= $it->cpf ?></td>
                            <td><?= $it->aceite == 1 ? 'Sim' : 'Não' ?></td>
                            <td style="width: 30%;" class="text-center"><a href="<?= base_url('pessoa/editar/' . $it->id) ?>" title="Editar cadastro" class="btn btn-primary"><i class="far fa-edit"></i>
                                    Editar</span></a> <a href="#<?= $it->id; ?>" title="Apagar" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-<?= $it->id ?>"><i class="fas fa-trash-alt"></i> Apagar</span></a>
                                    <?php if($it->agencia <> null) { ?>
                                <a href="#<?= $it->id; ?>" title="Consultar" class="btn btn-secondary" data-toggle="modal" data-target="#consulta-modal-<?= $it->id ?>" ><i class="fas fa-info"></i></i> Consultar</span></a>
                        <?php } ?>
                                </td>
                        </tr>


                        <!-- Modal delete -->
                        <div class="modal fade" id="delete-modal-<?= $it->id ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
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
                                        <a class="btn btn-primary" href="<?= base_url('pessoa/remover/' . $it->id) ?>">Sim</a>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal consulta -->
                        <div class="modal fade" id="consulta-modal-<?= $it->id ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="modalLabel">Dados bancarios <?= $it->nome ?> </h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label><b>Banco</b></label>
                                            <p><?= $it->banco; ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Agencia</b></label>
                                            <p><?= $it->agencia; ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Tipo de Conta</b></label>
                                            <p><?= $it->tpconta == '1' ? 'Corrente' : 'Poupança' ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Conta</b></label>
                                            <p><?= $it->conta; ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Valor total</b></label>
                                            <p>R$ <?= $it->vl_total; ?></p>
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
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
                        <b>Todal de Registros: <?= sizeof($pessoas); ?></b>
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