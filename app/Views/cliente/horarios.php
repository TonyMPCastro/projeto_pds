<?php

if (!defined('4578S9')) {
  header("Location: /");
  die("Erro: Página não encontrada!");
}
if (isset($this->dados['horarios'])) {
  $horarios = $this->dados['horarios'];
} else {
  $horarios = [];
}


$table = 10;

require_once("app/Views/menu_footer/menu.php");

?>


<!--Antonio que não sabe php -->
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <a href="<?php echo URL . 'home/onShow'; ?>" class="menu-link" title="Home"><i class="mdi mdi-home"></i></a>
    >
    <a href="<?php echo URL . 'financeiro/horarios'; ?>" class="menu-link"><span>HORÁRIOS</span></a>

    <br>
    <br>
    <div class="">
      <div class="card-header">
        <strong>HORÁRIOS</strong>
      </div>
      <br>
      <div class="text-center">
        <a href="<?php echo URL . 'financeiro/onHorario' ?>" class="btn btn-outline-success btn-lg">HORÁRIO</a>
      </div>
      <br>
      <table id="example<?= $table; ?>" class="display" style="width:100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Dia Semana</th>
            <th>Horario</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php if (count($horarios) > 0) {
            foreach ($horarios as $horario) { ?>
              <tr>
                <td style='font-size:28px'>
                  <a href="<?php echo URL . 'financeiro/onEdit_h?id=' . $horario->id; ?>" title="Editar" data-toggle="popover" data-trigger="hover" data-content="Some content">
                    <i style="color:#0090e7;" class='mdi mdi-table-edit'></i>
                  </a>
                  <!-- &nbsp;&nbsp;&nbsp;
                  <a href="#" title="Apagar" data-toggle="modal" data-target="#confirm">
                    <i style="color:red;" class='mdi mdi-delete'></i>
                  </a> -->
                </td>
                <td><?= $horario->dia; ?></td>
                <td><?= $horario->horario; ?></td>
                <td><?= ($horario->status == "1")?"ATIVO":"INATIVO"; ?></td>
              </tr>
          <?php  }
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Dia Semana</th>
            <th>Horario</th>
            <th>Status</th>
          </tr>
        </tfoot>
      </table>
      <div class="card-footer text-center">


      </div>
    </div>
  </div>
</div>

<!-- partial -->


<?php include "app/Views/menu_footer/footer.php"; ?>