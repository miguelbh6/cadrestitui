<div class="row text-center">
    <div class="col-12">
        <h1> PORTAL DE RESTITUIÇÃO DE VALORES</h1>
    </div>
</div>
<div class="row text-center mb-5">
    <div class="col-12">
        <h3>
            <p class="text-danger">Massa Falida DN Administradora de Consórcios</p>
        </h3>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="row">
            <div class="col-12">
                <h4>Verifica CPF/CNPJ a restituir</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form id="validation" action="<?=base_url(); ?>site/verificarCPF" method="post" accept-charset="utf-8"
                    role="form">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF ou CNPJ" required
                                maxlength="20">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Verificar</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <br>
                <h6 class="mbr-section-title pb-3 align-center mbr-fonts-style">Passo
                    1 de 4</h6>
            </div>
        </div>
        <script>

        var CpfCnpjMaskBehavior = function (val) {
			return val.replace(/\D/g, '').length <= 11 ? '000.000.000-009' : '00.000.000/0000-00';
		},
    cpfCnpjpOptions = {
    	onKeyPress: function(val, e, field, options) {
      	field.mask(CpfCnpjMaskBehavior.apply({}, arguments), options);
      }
    };

$(function() {
	$(':input[name=cpf]').mask(CpfCnpjMaskBehavior, cpfCnpjpOptions);
})
       
        </script>
    </div>
    <div class="col-6">
        <div class="row">
            <div class="col-12">
                <h4>Comunicado de Restituição - Primeiro Lote</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-justify">
                <p>O Administrador Judicial da Massa Falida da DN Administradora de Consórcios., cumprindo as
                    atribuições que lhe são conferidas pela Lei de Falências 11.101/05, comunica e solicita aos
                    consorciados, não contemplados, detentores de crédito com direito à restituição nos moldes do artigo
                    85 da Lei supra citada, que efetuem, neste site, o registro cadastral para fins de recebimento dos
                    créditos a que têm direito.
                    Para os casos especiais, nos quais tenham ocorrido morte ou incapacidade do consorciado, não
                    contemplado, o cadastro se dará, exclusivamente, através do e-mail consorcio@cndn.com.br, onde serão
                    informados dos procedimentos a serem adotados pelos herdeiros ou representantes legais.
                    A restituição homologada pelo Juiz da 2ª Vara Empresarial e de Fazenda Pública, Autos do Processo de
                    n. 0256579-84.2015.8.0433, corresponde a 57,94% do valor total a que tem direito cada consorciado
                    não contemplado. Informamos, ainda e, em complementação, que os consorciados, não contemplados, que
                    efetuaram pagamentos após a data de 21/01/2015 - momento em que restou decretada a Liquidação
                    Extrajudicial -, terão a restituição daqueles valores pagos de forma integral.

                </p>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12">
                Luiz Antonio Lanza
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12">
                Administrador Judicial
            </div>
        </div>
    </div>
</div>