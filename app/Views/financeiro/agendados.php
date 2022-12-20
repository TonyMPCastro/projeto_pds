<?php

if (!defined('4578S9')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}
if (isset($this->dados['menu'])) {
    $menu = $this->dados['menu'];
}

if (isset($this->dados['lista_em_abertas'])) {
    $lista_em_abertas = $this->dados['lista_em_abertas'];
}else{
  $lista_em_abertas = [];
}

if (isset($this->dados['servicos'])) {
  $servicos = $this->dados['servicos'];
}else{
$servicos = [];
}


$table = 5;
?>
<?php 
//include "app/Views/menu_footer/menu.php"; 
// Incluir para chamada de 
require_once("app/Views/menu_footer/menu.php");
require_once("app/Lib/Mask.php");
use app\Lib\Mask;


//Mask::setmask('98984320228', '(##)#####-####');
?>

<!--Antonio que não sabe php -->
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <a href="<?php echo URL . 'home/onShow' ?>" class="menu-link" title="Home"><i class="mdi mdi-home"></i></a>
    >
    <a href="<?php echo URL . 'agendados/index' ?>" class="menu-link"><span>HORÁRIOS AGENDADOS</span></a>

    <br>
    <br>
    <div class="">
      <div class="card-header">
        <strong>HORÁRIOS AGENDADOS</strong>
      </div>
      <br>
      <div class="text-center">
        <a href="<?php echo URL . 'pendentes/onShow' ?>" class="btn btn-outline-success btn-lg">AGENDAR HORÁRIO</a>
      </div>
      <br>
      <table id="example<?= $table; ?>" class="display" style="width:100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Procedimentos</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Dia - Hora</th>
            <!--<th></th>-->
            <!-- <th>Id_user</th> -->
          </tr>
        </thead>
        <tbody>
          <?php if (count($lista_em_abertas) > 0) {
            foreach ($lista_em_abertas as $lista_em_abertas_1) { 
              $arr = explode(";",$lista_em_abertas_1->servicos);
              $str_serv = "";
              $total = 0;
              foreach ($arr as $value) {
                foreach($servicos as $ser){
                    if($value == $ser->id){
                      $str_serv .= $ser->nome. " - ".number_format($ser->valor,2,",",".")."<br>";
                      $total += $ser->valor;
                    }
                  }
              }

              $str_serv .= "<b>Total = ".number_format($total,2,",",".")."<b>";

              $dia_semana = mb_strtoupper(utf8_encode(strftime("%A", strtotime($lista_em_abertas_1->horario_agendado))), 'UTF-8')

              ?>
              <tr>
                <td style='font-size:28px'>
                  <a href="<?php echo URL . 'agendados/onEdit?id=' . $lista_em_abertas_1->id; ?>" title="Editar" data-toggle="popover" data-trigger="hover" data-content="Some content">
                    <i style="color:#0090e7;" class='mdi mdi-table-edit'></i>
                  </a>
                  <!-- &nbsp;&nbsp;&nbsp;
                  <a href="#" title="Apagar" data-toggle="modal" data-target="#confirm">
                    <i style="color:red;" class='mdi mdi-delete'></i>
                  </a> -->
                </td>
                <td><?= $lista_em_abertas_1->nome_user; ?></td>
                <td><?= $str_serv ?></td>
                <td><a style="font-size: 26px;" href="mailto:<?= $lista_em_abertas_1->email ?>" title="Email"><i class="mdi mdi-email"></i></a></td>
                <td><a target="_blanck" href="<?php echo "https://api.whatsapp.com/send?phone=55".$lista_em_abertas_1->telefone;?>"><i style="font-size: 26px;"  class="mdi mdi-whatsapp"></i><?= Mask::setmask($lista_em_abertas_1->telefone, '(##) #####-####'); ?></a></td>
                <td><?= $dia_semana."<br>".date("d/m/Y H:i",strtotime($lista_em_abertas_1->horario_agendado));  ?></td>
              </tr>
          <?php  }
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
          <th>#</th>
            <th>Nome</th>
            <th>Procedimentos</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Data - Hora</th>
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