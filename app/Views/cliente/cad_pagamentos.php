<?php

if (!defined('4578S9')) {
  header("Location: /");
  die("Erro: Página não encontrada!");
}


if (isset($this->dados['f_pagamento'])) {
  $f_pagamento = $this->dados['f_pagamento'];
} else {
  $f_pagamento = null;
}

?>

<?php require_once("app/Views/menu_footer/menu.php"); ?>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">

    <a href="<?php echo URL . 'home/onShow' ?>" class="menu-link" title="Home"><i class="mdi mdi-home"></i></a>
    >
    <a href="<?php echo URL . 'financeiro/onFormaPagamento' ?>" class="menu-link"><span>CADASTRO DE PAGAMENTOS</span></a>

    <br>
    <br>
    <div class="card">
      <div class="card-header">
        <strong> Cadastro de Pagamentos</strong>
        <div class="float-right">
          <a href="<?php echo URL . 'financeiro/formaPagamento' ?>" class="btn btn-light">VOLTAR</a>
        </div>
      </div>
      <form class="row g-3 needs-validation" method="POST" action="<?php echo URL . 'financeiro/onFormaPagamentoSave' ?>">
        <div class="card-body">
          <div class="row">

            <div class="col-sm-8 col-lg-8">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Nome: <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="nome" name="nome" value="<?php echo isset($f_pagamento->nome) ? $f_pagamento->nome : ""; ?>" placeholder="Descrição do Serviço" required>
                </div>
              </div>
            </div>


            <div class="col-sm-4 col-lg-4">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Taxa: <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="number" min="0" step="0.01" class="form-control" id="taxa" name="taxa" value="<?php echo isset($f_pagamento->taxa) ? $f_pagamento->taxa : ""; ?>" placeholder="taxa" required>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6 col-lg-6">
              <div class="form-group row ">
                <label for="validationCustom01" class="col-sm-12 text-left control-label col-form-label">Tipo Taxa: <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12  has-validation">

                  <div class="form-check">
                    <input class="form-check-input" type="radio" id="tipo_taxa" name="tipo_taxa" value="1" required <?php echo isset($f_pagamento->tipo_taxa) ? (($f_pagamento->tipo_taxas == 1) ? 'checked' : '') : ""; ?>>
                    <label class="form-check-label" for="DESATIVADO">
                      FIXA
                    </label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="radio" id="tipo_taxa" name="tipo_taxa" value="2" required <?php echo isset($f_pagamento->tipo_taxa) ? (($f_pagamento->tipo_taxa == 2) ? 'checked' : '') : ""; ?>>
                    <label class="form-check-label" for="ATIVADO">
                      PORCENTAGEM
                    </label>
                  </div>
                </div>
              </div>
            </div>


            
              <div class="col-sm-6 col-lg-6">
                <div class="form-group row ">
                  <label for="validationCustom01" class="col-sm-12 text-left control-label col-form-label">Status: <span style="color: red;" data-uw-styling-context="true">*</span></label>
                  <div class="col-sm-12  has-validation">

                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="status" name="status" value="1" required <?php echo isset($f_pagamento->status) ? (($f_pagamento->status == 1) ? 'checked' : '') : ""; ?>>
                      <label class="form-check-label">
                        ATIVADO
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="status" name="status" value="2" required <?php echo isset($f_pagamento->status) ? (($f_pagamento->status == 2) ? 'checked' : '') : ""; ?>>
                      <label class="form-check-label">
                        DESATIVADO
                      </label>
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo isset($f_pagamento->id) ? $f_pagamento->id : ""; ?>">

                  </div>
                </div>
              </div>

          </div>
          <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary mr-2">SALVAR</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>


<?php require_once("app/Views/menu_footer/footer.php"); ?>