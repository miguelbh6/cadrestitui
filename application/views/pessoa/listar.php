<div class="row">
    <div class="col-md-12 mb-3">
        <h3>Pessoas</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <?php echo form_open('pessoa/pesquisar'); ?>
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
                <div class="col-md-12 mb-3">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">Data cadastro</th>
                                   <!-- <th scope="col">Aceite</th> -->
                                    <th class="text-center" scope="col">Acões</th>
                                </tr>
                            </thead>
                            <?php
                            foreach ($pessoas as $it) :
                            ?>
                                <tr>
                                    <td><?= $it->nome ?></td>



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
                                    <td><?= date("d/m/Y H:i:s", strtotime($it->dt_inclusao)); ?></td>
                                  <!--  <td><?= $it->aceite == 1 ? 'Sim' : 'Não' ?></td>-->
                                    <td style="width: 30%;" class="text-center"><a href="<?= base_url('pessoa/editar/' . $it->id) ?>" title="Editar cadastro" class="btn btn-primary"><i class="far fa-edit"></i>
                                            Editar</span></a> <a href="#<?= $it->id; ?>" title="Apagar" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-<?= $it->id ?>"><i class="fas fa-trash-alt"></i> Apagar</span></a>
                                        <?php if ($it->agencia <> null) { ?>
                                            <a href="#<?= $it->id; ?>" title="Detalhes" class="btn btn-secondary" data-toggle="modal" data-target="#consulta-modal-<?= $it->id ?>"><i class="fas fa-info"></i></i> Detalhes</span></a>
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
                                            <div class="modal-header alert-primary">
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
                                                    <p><?= $it->tpconta == '0' ? 'Corrente' : 'Poupança' ?></p>
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Conta</b></label>
                                                    <p><?= $it->conta.'-'.$it->dv; ?></p>
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Total</b></label>
                                                    <p>R$ <?= $it->vl_total; ?></p>
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Data pagamento</b></label>
                                                    <p> <?= !is_null($it->dt_pago) ? $it->dt_pago : '' ?></p>
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
                                <b>Total de Registros: <?= sizeof($pessoas); ?></b>
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

        <script>
	$('input[name="dt_pago_pesquisa"]').mask("##/##/####");
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
	$('input[name="dt_pago_pesquisa"]').datepicker();
	
       


       
        
</script>