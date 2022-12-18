<?php

if (!defined('4578S9')) {
  header("Location: /");
  die("Erro: Página não encontrada!");
}
if (isset($this->dados['menu'])) {
  $menu = $this->dados['menu'];
}

if (isset($this->dados['forma_pagamento'])) {
  $lista_pagamento = $this->dados['forma_pagamento'];
} else {
  $lista_de_pagamento = [];
}
$table = 5;
?>
<?php
//include "app/Views/menu_footer/menu.php"; 
// Incluir para chamada de 
require_once("app/Views/menu_footer/menu.php");
// require_once("app/Lib/Mask.php");
// use app\Lib\Mask;


//Mask::setmask('98984320228', '(##)#####-####');
?>

<!--Antonio que não sabe php -->
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <a href="<?php echo URL . 'home/onShow' ?>" class="menu-link" title="Home"><i class="mdi mdi-home"></i></a>
    >
    <a href="<?php echo URL . 'financeiro/index' ?>" class="menu-link"><span>LISTAGEM DE PAGAMENTOS</span></a>

    <br>
    <br>
    <div class="">
      <div class="card-header">
        <strong>Listagem de Pagamentos</strong>
      </div>
      <br>
      <div class="text-center">
        <a href="<?php echo URL . 'financeiro/onFormaPagamento' ?>" class="btn btn-outline-success btn-lg">CADASTRAR</a>
      </div>
      <br>
      <table id="example<?= $table; ?>" class="display" style="width:100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Taxa</th>
            <th>Tipo Taxa</th>
            <th>Status</th>
            <!-- <th></th> -->
            <!--<th>id	</th>-->
            <!-- <th>Id_user</th> -->
          </tr>
        </thead>
        <tbody>
          <?php if (count($lista_pagamento) > 0) {
            foreach ($lista_pagamento as $lista_de_pagamento) { ?>
              <tr>
                <td style='font-size:28px'>
                  <a href="<?php echo URL . 'financeiro/onEdit_f?id=' . $lista_de_pagamento->id; ?>" title="Editar" data-toggle="popover" data-trigger="hover" data-content="Some content">
                    <i style="color:#0090e7;" class='mdi mdi-account-plus'></i>
                  </a>
                  <!-- &nbsp;&nbsp;&nbsp;
                  <a href="#" title="Apagar" data-toggle="modal" data-target="#confirm">
                    <i style="color:red;" class='mdi mdi-delete'></i>
                  </a> -->
                </td>
                <td><?= $lista_de_pagamento->nome; ?></td>
                <td><?= number_format($lista_de_pagamento->taxa,2,",","."); ?></td>
                <td><?= ($lista_de_pagamento->tipo_taxa == 1) ? "FIXA":"PORCENTAGEM"; ?></td>
                <td><?= ($lista_de_pagamento->status == 1) ? "ATIVADO":"DESATIVADO"; ?></td>
                <!-- <td><//?= $lista_em_abertas_1->dia.' - '.$lista_em_abertas_1->horario  ?></td> -->
              </tr>
          <?php  }
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Taxa</th>
            <th>Tipo Taxa</th>
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

<?php include "app/Views/menu_footer/footer.php"; ?>