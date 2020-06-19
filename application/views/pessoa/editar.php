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
            }, 'json');
    });
});
</script>
<?php  require_once( __DIR__. '../../fragments/alert.php'); ?>
<div class="row">
    <div class="col-12">
        <h4>
            Cadastro pessoa</h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form id="validation" action="<?=base_url(); ?>pessoa/cadastrar" method="post" accept-charset="utf-8"
            role="form">
            <div class="row">
                <div class="col-12 mb-3">
                    <input type="text" name="nome" class="form-control" placeholder="Nome" required
                        value="<?=(isset($pessoa) ? $pessoa->nome : '') ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <input type="text" name="cpf" class="form-control" placeholder="CPF" required
                        value="<?=(isset($pessoa) ? $pessoa->cpf : '') ?>" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <input type="text" name="dtnasc" class="form-control" placeholder="Data Nascimento" required
                        maxlength="10" value="<?php echo (isset($pessoa) ? $pessoa->dtnasc : '') ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <input type="text" name="tel1" class="form-control" placeholder="Telefone 1" required maxlength="13"
                        value="<?=(isset($pessoa) ? $pessoa->tel1 : '') ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <input type="text" name="tel2" class="form-control" placeholder="Telefone 2" maxlength="13"
                        value="<?=(isset($pessoa) ? $pessoa->tel2 : '') ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <input type="text" id="cep" name="cep" class="form-control" placeholder="CEP" required maxlength="9"
                        value="<?=(isset($pessoa) ? $pessoa->cep : '') ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade" required
                        maxlength="255" value="<?=(isset($pessoa) ? $pessoa->cidade : '') ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <input type="text" name="rua" id="rua" class="form-control" placeholder="Rua" required
                        maxlength="255" value="<?=(isset($pessoa) ? $pessoa->rua : '') ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro" required
                        maxlength="255" value="<?=(isset($pessoa) ? $pessoa->bairro : '') ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <input type="text" name="uf" id="estado" class="form-control" placeholder="Estado"
                        required maxlength="255" value="<?=(isset($pessoa) ? $pessoa->uf : '') ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6 mb-3">
                    <input type="hidden" name="id" value="<?=(isset($pessoa) ? $pessoa->id : '') ?>">
                    <span class="input-group-btn"><button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Salvar
                        </button></span>
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
        dayNames: ['Domingo', 'Segunda-feira', 'Ter&ccedil;a-feira', 'Quarta-feira', 'Quinta-feira',
            'Sexta-feira', 'Sabado'
        ],
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
</script>