<div class="row">
    <div class="col-md-12 mb-3">
        <h3>Pessoas com cadastro bancarios</h3>
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
                        <th scope="col">Banco</th>
                        <th scope="col">Agencia</th>
                        <th scope="col">Tipo de conta</th>
                        <th scope="col">Conta</th>
                        <th scope="col">Valor Total</th>
                        <th class="text-center" scope="col">Acões</th>
                    </tr>
                </thead>
                <?php
					foreach ($pessoas as $it) :
					?>
                <td><?=$it->cpf ?></td>
                <td><?=$it->nome ?></td>
                <td><?=$it->banco ?></td>
                <td><?=$it->agencia ?></td>
                <td><?=$it->tpconta == '1' ? 'Poupança' : 'Corrente' ?></td>
                <td><?=$it->conta ?></td>
                <td><?=$it->vl_total ?></td>
                <td style="width: 20%;" class="text-center"> <a href="#<?=$it->id; ?>" title="Apagar"
                        class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-<?=$it->id ?>"><i
                            class="fas fa-trash-alt"></i> Apagar</span></a></td>
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
                    <b>Todal de Registros: <?=sizeof($pessoas); ?></b>
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