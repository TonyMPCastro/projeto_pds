<?php

if (!defined('4578S9')) {
  header("Location: /");
  die("Erro: Página não encontrada!");
}


if (isset($this->dados['servico'])) {
  $servico = $this->dados['servico'];
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

            <div class="col-sm-4 col-lg-4">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Descrição: <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo isset($servico->descricao) ? $servico->descricao : ""; ?>" placeholder="Descrição do Serviço" required>
                </div>
              </div>
            </div>

            <div class="col-sm-4 col-lg-4">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Valor: <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="number" min="0" step="0.01" class="form-control" id="valor" name="valor" value="<?php echo isset($servico->valor) ? $servico->valor : ""; ?>" placeholder="Valor" required>
                </div>
              </div>
            </div>

            <div class="col-sm-4 col-lg-4">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Data: <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="date" class="form-control" id="date" name="data_gasto" value="<?php echo isset($servico->descricao) ? $servico->data : ""; ?>" placeholder="" required>
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
