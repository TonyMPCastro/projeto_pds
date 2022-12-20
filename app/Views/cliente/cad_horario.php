<?php

if (!defined('4578S9')) {
  header("Location: /");
  die("Erro: Página não encontrada!");
}


if (isset($this->dados['horario'])) {
  $horario = $this->dados['horario'];
}

?>

<?php require_once("app/Views/menu_footer/menu.php"); ?>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">

    <a href="<?php echo URL . 'home/onShow'; ?>" class="menu-link" title="Home"><i class="mdi mdi-home"></i></a>
    >
    <a href="<?php echo URL . 'financeiro/onHorario'; ?>" class="menu-link"><span>CADASTRO DE HORARIO</span></a>

    <br>
    <br>
    <div class="card">
      <div class="card-header">
        <strong> Cadastro de Horários</strong>
        <div class="float-right">
          <a href="<?php echo URL . 'financeiro/horarios'; ?>" class="btn btn-light">VOLTAR</a>
        </div>
      </div>
      <form class="row g-3 needs-validation" method="POST" action="<?php echo URL . 'financeiro/onHorarioSave' ?>">
        <div class="card-body">
          <div class="row">
           
            <div class="col-sm-6 col-lg-8">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Dia da semana:<span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="semana_id" name="semana_id" value="<?php echo isset($horario->semana_id) ? $horario->semana_id : ""; ?>" placeholder="Dia da semana" required>
                 
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-lg-4">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 text-left control-label col-form-label">Horário: <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="time" min="0" step="0.01" class="form-control" id="horario" name="horario" value="<?php echo isset($horario->horario) ? $horario->horario : ""; ?>" placeholder="Horário" required>
                 
                </div>
              </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-6 col-lg-6">
                <div class="form-group row ">
                  <label for="validationCustom01" class="col-sm-12 text-left control-label col-form-label">Status: <span style="color: red;" data-uw-styling-context="true">*</span></label>
                  <div class="col-sm-12  has-validation">

                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="status" name="status" value="1" required <?php echo isset($horario->status) ? (($horario->status == 2) ? 'checked' : '') : ""; ?>>
                      <label class="form-check-label">
                        ATIVADO
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="status" name="status" value="1" required <?php echo isset($horario->status) ? (($horario->status == 1) ? 'checked' : '') : ""; ?>>
                      <label class="form-check-label">
                        DESATIVADO
                      </label>
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo isset($horario->id) ? $horario->id : ""; ?>">

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