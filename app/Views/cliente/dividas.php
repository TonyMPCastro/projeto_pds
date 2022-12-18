<?php

if (!defined('4578S9')) {
  header("Location: /");
  die("Erro: Página não encontrada!");
}
if (isset($this->dados['menu'])) {
  $menu = $this->dados['menu'];
}

if (isset($this->dados['dividas'])) {
  $lista_dividas = $this->dados['dividas'];
} else {
  $lista_dividas = [];
}

$table = 4;

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
    <a href="<?php echo URL . 'financeiro/dividas' ?>" class="menu-link"><span>LISTAGEM DE DESPESAS</span></a>

    <br>
    <br>
    <div class="">
      <div class="card-header">
        <strong>Listagem de Despesas</strong>
      </div>
      <br>
      <div class="text-center">
        <a href="<?php echo URL . 'financeiro/onDividas' ?>" class="btn btn-outline-success btn-lg">CADASTRAR</a>
      </div>
      <br>
      <table id="example<?= $table; ?>" class="display" style="width:100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Data</th>
          </tr>
        </thead>
        <tbody>
          <?php if (count($lista_dividas) > 0) {
            foreach ($lista_dividas as $lista_de_dividas) { ?>
              <tr>
                <td style='font-size:28px'>
                  <a href="<?php echo URL . 'financeiro/onEdit_d?id=' . $lista_de_dividas->id; ?>" title="Editar" data-toggle="popover" data-trigger="hover" data-content="Some content">
                    <i style="color:#0090e7;" class='mdi mdi-table-edit'></i>
                  </a>
                  &nbsp;&nbsp;&nbsp;
                  <a href="" title="Apagar" data-toggle="modal" data-target="#confirm<?= $lista_de_dividas->id; ?>">
                    <i style="color:red;" class='mdi mdi-delete'></i>
                  </a>
                </td>
                <td><?= $lista_de_dividas->descricao; ?></td>
                <td><?= number_format($lista_de_dividas->valor,2,",","."); ?></td>
                <td><?= date("d/m/Y", strtotime($lista_de_dividas->data_gasto)); ?></td>
              </tr>

              <div class="modal fade" id="confirm<?= $lista_de_dividas->id; ?>" role="dialog">
                <div class="modal-dialog modal-md">

                  <div class="modal-content">
                    <div class="modal-body">
                      <p> DESEJA REALMENTE FAZER ISSO?</p>
                    </div>
                    <div class="modal-footer">
                      <a href="<?php echo URL . 'financeiro/onDelete_d?id=' . $lista_de_dividas->id; ?>" type="button" class="btn btn-danger" id="delete">Apagar Registo</a>
                      <button type="button" data-dismiss="modal" class="btn btn-warning">Cancelar</button>
                    </div>
                  </div>

                </div>
              </div>

          <?php

            }
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Data</th>
          </tr>
        </tfoot>
      </table>
      <div class="card-footer text-center">


      </div>
    </div>
  </div>
</div>

<?php include "app/Views/menu_footer/footer.php"; ?>