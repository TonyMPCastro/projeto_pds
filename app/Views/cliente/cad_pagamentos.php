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
    <a href="<?php echo URL . 'servico_adm/onShow' ?>" class="menu-link"><span>CADASTRO DE PAGAMENTOS</span></a>

    <br>
    <br>
    <div class="card">
      <div class="card-header">
        <strong> Cadastro de Pagamentos</strong>
        <div class="float-right">
          <a href="<?php echo URL . 'servico_adm/index' ?>" class="btn btn-light">VOLTAR</a>
        </div>
      </div>
        <form class="row g-3 needs-validation" method="POST" action="<?php echo URL . 'servico_adm/onSave' ?>">
            <div class="card-body">
                <div class="col-sm-6 col-lg-4">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 text-left control-label col-form-label">Valor: <span style="color: red;" data-uw-styling-context="true">*</span></label>
                    <div class="col-sm-12 input-group has-validation">
                    <input type="number" min="0" step="0.01" class="form-control" id="valor" name="valor" value="<?php echo $servico->valor; ?>" placeholder="Valor" required>
                    <div class="invalid-feedback">
                        Digite o Valor
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-8">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Descrição: <span style="color: red;" data-uw-styling-context="true">*</span></label>
                    <div class="col-sm-12 input-group has-validation">
                    <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $servico->descricao; ?>" placeholder="Descrição do Serviço" required>
                    <div class="invalid-feedback">
                        Digite o Nome do Serviço
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
            <div class="col-sm-6 col-lg-8">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Data: <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="date" name="data_gasto" value="<?php echo $servico->descricao; ?>" placeholder="" required>
                  <div class="invalid-feedback">
                    Digite a Data do gasto
                  </div>
                </div>
              </div>
            </div>
            </div>
          <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
          </div>
      </form>

    </div>
  </div>
</div>


<?php require_once("app/Views/menu_footer/footer.php"); ?>