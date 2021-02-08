<?php require_once(__DIR__ . '../../fragments/alert.php'); ?>
<div class="row">
    <div class="col-12">
        <h4>
            Cadastro planilha</h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form id="validation" action="<?= base_url(); ?>planilha/cadastrar" method="post" accept-charset="utf-8" role="form">

            <label>CPF ou CNPJ</label>
            <div class="row">
                <div class="col-12 mb-3">
                    <input type="text" name="cpf" class="form-control" required value="<?= (isset($planilha) ? $planilha->cpf : '') ?>">
                </div>
            </div>
            <label>Grupo</label>
            <div class="row">
                <div class="col-12 mb-3">
                    <input type="text" name="grupo" class="form-control" required maxlength="10" value="<?php echo (isset($planilha) ? $planilha->grupo : '') ?>">
                </div>
            </div>
            <label>Cota</label>
            <div class="row">
                <div class="col-12 mb-3">
                    <input type="text" name="cota" class="form-control" required maxlength="10" value="<?php echo (isset($planilha) ? $planilha->cota : '') ?>">
                </div>
            </div>

            <label>Situação</label>
            <div class="row">
                <div class="col-12 mb-3">
                    <input type="text" id="situacao" name="situacao" class="form-control" required maxlength="255" value="<?= (isset($planilha) ? $planilha->situacao : '') ?>">
                </div>
            </div>
            <label>Valor a restituir (informa casas decimais por .)</label>
            <div class="row">
                <div class="col-12 mb-3">
                    <input type="text" name="valor_restituir" id="valor_restituir" class="form-control" required maxlength="255" value="<?= (isset($planilha) ? $planilha->valor_restituir : '') ?>">
                </div>
            </div>
            <label>Percentual a restituir (informa casas decimais por .)</label>
            <div class="form-group">
                <input type="text" name="percentual_restituir" id="percentual_restituir" class="form-control" value="<?= (isset($planilha) ? $planilha->percentual_restituir : '') ?>" required>
            </div>

            <label>Pago</label>
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pagto" id="inlineRadio1" <?= (isset($planilha) &&  ($planilha->pagto == '0') ? ' checked' : '') ?> value="0" required>
                    <label class="form-check-label" for="inlineRadio1">Não</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pagto" id="inlineRadio2" <?= (isset($planilha) && ($planilha->pagto == '1') ? ' checked' : '') ?> value="1" required>
                    <label class="form-check-label" for="inlineRadio2">Sim</label>
                </div>
            </div>

            <div class="row">
                <div class="col-2 mb-3">
                    <input type="hidden" name="cpf_hidden" value="<?= (isset($planilha) ? $planilha->cpf : '') ?>">
                    <span class="input-group-btn"><button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Salvar
                        </button></span>
                </div>
                <div class="col-md-2">
            <button type="button" class="btn btn-primary" onclick="window.location='<?php echo base_url('planilha')?>'"><i class="fas fa-backward"></i> Voltar</button>
        </div>
            </div>
        </form>
    </div>
</div>