<?php

if (!defined('4578S9')) {
  header("Location: /");
  die("Erro: Página não encontrada!");
}

if (isset($this->dados['servicos'])) {
  $servicos = $this->dados['servicos'];
} else {
  $servicos = false;
}

$table = 2;
?>

<?php

require_once("app/Views/menu_footer/menu.php");

require_once("app/Lib/Mask.php");

use app\Lib\Mask;


//Mask::setmask('98984320228', '(##)#####-####');

?>


<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <a href="<?php echo URL . 'home/onShow' ?>" class="menu-link" title="Home"><i class="mdi mdi-home"></i></a>
    >
    <a href="<?php echo URL . 'servico_adm/index' ?>" class="menu-link"><span>LISTAGEM DE SERVIÇOS</span></a>

    <br>
    <br>
    <div class="">
      <div class="card-header">
        <strong>Listagem de Serviços</strong>
      </div>
      <br>
      <div class="text-center">
        <a href="<?php echo URL . 'servico_adm/onShow' ?>" class="btn btn-outline-success btn-lg">CADASTRAR</a>
      </div>
      <br>
      <table id="example<?= $table; ?>" class="display" style="width:100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Staus</th>
            <!-- <th>Id Tipo</th> -->
            <!-- <th>Id_user</th> -->
          </tr>
        </thead>
        <tbody>
          <?php if ($servicos) {
            foreach ($servicos as $servico) { ?>
              <tr class="tt">
                <td class="ttt" style='font-size:28px'>
                  <a href="<?php echo URL . 'servico_adm/onEdit?id=' . $servico->id; ?>" title="Editar" data-toggle="popover" data-trigger="hover" data-content="Some content">
                    <i style="color:#0090e7;" class='mdi mdi-table-edit'></i>
                  </a>
                  <!-- &nbsp;&nbsp;&nbsp;
                  <a title="Apagar" id="delete" data-toggle="modal" data-target="#confirm<?= $servico->nome; ?>">
                    <i style="color:red;" class='mdi mdi-delete'></i>
                  </a> -->
                </td>
                <td><?= $servico->nome; ?></td>
                <td><?= number_format($servico->valor,2,",","."); ?></td>
                <td><?= ($servico->status == 2) ? "Ativo" : "Desativado"; ?></td>
              </tr>

              <div class="modal fade" id="confirm<?= $servico->nome; ?>" role="dialog">
                <div class="modal-dialog modal-md">

                  <div class="modal-content">
                    <div class="modal-body">
                      <p> DESEJA REALMENTE FAZER ISSO?</p>
                    </div>
                    <div class="modal-footer">
                      <a href="<?php echo URL . 'servico_adm/onDelete?id=' . $servico->id; ?>" type="button" class="btn btn-danger" id="delete_conf">Apagar Registo</a>
                      <button type="button" data-dismiss="modal" class="btn btn-warning">Cancelar</button>
                    </div>
                  </div>

                </div>
              </div>
          <?php  }
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Staus</th>
            <!-- <th>Id Tipo</th> -->
            <!-- <th>Id_user</th> -->
          </tr>
        </tfoot>
      </table>
      <div class="card-footer text-center">


      </div>
    </div>
  </div>
</div>

<?php
require_once("app/Views/menu_footer/footer.php");
?>