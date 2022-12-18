<?php

if (!defined('4578S9')) {
  header("Location: /");
  die("Erro: Página não encontrada!");
}
if (isset($this->dados['menu'])) {
  $menu = $this->dados['menu'];
}

if (isset($this->dados['marcacao_servico'])) {
  $marcacao_servico = $this->dados['marcacao_servico'];
} else {
  $marcacao_servico = [];
}
$table = 3;
?>
<?php
//include "app/Views/menu_footer/menu.php"; 
// Incluir para chamada de 
require_once("app/Views/menu_footer/menu.php");
require_once("app/Lib/Mask.php");

use app\Lib\Mask;


//Mask::setmask('98984320228', '(##)#####-####');
?>

<!--Thales que não sabe php -->
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <a href="<?php echo URL . 'home2/index' ?>" class="menu-link" title="Home"><i class="mdi mdi-home"></i></a>
    >
    <a href="<?php echo URL . 'home2/index' ?>" class="menu-link"><span>MARCAÇAO DE HORARIOS</span></a>

    <br>
    <br>
    <div class="">
      <div class="card-header">
        <strong>HORÁRIOS</strong>
      </div>
      <br>
      <div class="text-center">
        <a href="<?php echo URL . 'home2/onShow' ?>" class="btn btn-outline-success btn-lg">CADASTRAR</a>
      </div>
      <br>
      <table id="example<?= $table; ?>" class="display" style="width:100%">
        <thead>
          <tr>
            <th>Serviço</th>
            <th>forma de pagamento</th>
            <!-- <th>Usuario</th> -->
            <th>Horario agendado</th>
            <th>Status</th>
            <!-- <th>Id_user</th> -->
          </tr>
        </thead>
        <tbody>
          <?php if (count($marcacao_servico) > 0) {
            foreach ($marcacao_servico as $marcacao_servico_1) { ?>
              <tr>
                <td><?= $marcacao_servico_1->servicos; ?></td>
                <td><?= $marcacao_servico_1->forma_pagamento_id ?></td>
                <!-- <td><?= $marcacao_servico_1->user_id; ?></td> -->
                <td><?= ($marcacao_servico_1->horario_agendado) ? date("d/m/Y H:i:s", strtotime($marcacao_servico_1->horario_agendado)) : "NÃO MARCADO" ?></td>
                <td><?= $marcacao_servico_1->status; ?></td>
              </tr>
          <?php  }
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th>Serviço</th>
            <th>forma de pagamento</th>
            <!-- <th>Usuario</th> -->
            <th>Horario agendado</th>
            <th>Status</th>
            <!--<th></th>-->
            <!-- <th>Id_user</th> -->
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