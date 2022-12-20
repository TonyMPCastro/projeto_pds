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

if (isset($this->dados['servicos'])) {
  $servicos = $this->dados['servicos'];
} else {
  $servicos = [];
}

$table = 7;
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
    <a href="<?php echo URL . 'home/onShow' ?>" class="menu-link" title="Home"><i class="mdi mdi-home"></i></a>
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
        <a href="<?php echo URL . 'home2/onShow' ?>" class="btn btn-outline-success btn-lg">MARCAR HORARIO</a>
      </div>
      <br>
      <table id="example<?= $table; ?>" class="display" style="width:100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Procedimentos</th>
            <th>forma de pagamento</th>
            <!-- <th>Usuario</th> -->
            <th>Horario agendado</th>
            <th>Status</th>
            <!-- <th>Id_user</th> -->
          </tr>
        </thead>
        <tbody>
          <?php if (count($marcacao_servico) > 0) {
            foreach ($marcacao_servico as $marcacao_servico_1) {

              $arr = explode(";", $marcacao_servico_1->servicos);
              $str_serv = "";
              $total = 0;
              foreach ($arr as $value) {
                foreach ($servicos as $ser) {
                  if ($value == $ser->id) {
                    $str_serv .= $ser->nome . " - " . number_format($ser->valor, 2, ",", ".") . "<br>";
                    $total += $ser->valor;
                  }
                }
              }

              $str_serv .= "<b>Total = " . number_format($total, 2, ",", ".") . "<b>";
          ?>
              <tr>
                <td style='font-size:28px'>
                <?php if($marcacao_servico_1->status == 1){?>
                  <a href="<?php echo URL . 'home2/onEdit?id=' . $marcacao_servico_1->id; ?>" title="Editar" data-toggle="popover" data-trigger="hover" data-content="Some content">
                    <i style="color:#0090e7;" class='mdi mdi-table-edit'></i>
                  </a>
                  <!-- &nbsp;&nbsp;&nbsp;
                  <a href="#" title="Apagar" data-toggle="modal" data-target="#confirm">
                    <i style="color:red;" class='mdi mdi-delete'></i>
                  </a>
                 -->
                 <?php }?>
                </td>

                <td><?= $str_serv;  ?></td>
                <td><?= $marcacao_servico_1->nome ?></td>
                <!-- <td>'<= $marcacao_servico_1->user_id; ?>'</td> -->
                <td><?= isset($marcacao_servico_1->horario_agendado) ? date("d/m/Y H:i", strtotime($marcacao_servico_1->horario_agendado)) : $marcacao_servico_1->dia . " - " . $marcacao_servico_1->horario; ?></td>
                <td><?= ($marcacao_servico_1->status == 1) ? "AGUARDANDO" : (($marcacao_servico_1->status == 2) ? "MARCADO" : "CONCLUIDO"); ?></td>
              </tr>
          <?php  }
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Procedimentos</th>
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