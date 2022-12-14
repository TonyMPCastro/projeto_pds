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
}
$table = 3;
?>
<?php 
//include "app/Views/menu_footer/menu.php"; 
// Incluir para chamada de 
require_once("app/Views/menu_footer/menu.php");
?>

<!--Antonio que não sabe php -->
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <a href="<?php echo URL . 'home/onShow' ?>" class="menu-link" title="Home"><i class="mdi mdi-home"></i></a>
    >
    <a href="<?php echo URL . 'servico_adm/index' ?>" class="menu-link"><span>LISTAGEM DE HORÁRIOS</span></a>

    <br>
    <br>
    <div class="">
      <div class="card-header">
        <strong>HORÁRIOS</strong>
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
            <th>Email</th>
            <th>Telefone</th>
            <th>Dia - Hora</th>
            <!--<th></th>-->
            <!-- <th>Id_user</th> -->
          </tr>
        </thead>
        <tbody>
          <?php if ($lista_em_abertas) {
            foreach ($lista_em_abertas as $lista_em_abertas_1) { ?>
              <tr>
                <td style='font-size:28px'>
                  <a href="<?php echo URL . 'servico_adm/onEdit?id=' . $lista_em_abertas_1->id; ?>" title="Editar" data-toggle="popover" data-trigger="hover" data-content="Some content">
                    <i style="color:#0090e7;" class='mdi mdi-account-plus'></i>
                  </a>
                  &nbsp;&nbsp;&nbsp;
                  <a href="#" title="Apagar" data-toggle="modal" data-target="#confirm">
                    <i style="color:red;" class='mdi mdi-delete'></i>
                  </a>
                </td>
                <td><?= $lista_em_abertas_1->nome_user; ?></td>
                <td><?= $lista_em_abertas_1->email ?></td>
                <td><?= $lista_em_abertas_1->telefone  ?></td>
                <td><?= $lista_em_abertas_1->dia.' - '.$lista_em_abertas_1->horario  ?></td>
              </tr>
          <?php  }
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
          <th>#</th>
            <th>Nome</th>
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

<!--Antonio que não sabe php-->

<!-- <pre>

<?php
//  print_r($lista_em_abertas)
?>

</pre> -->

<!-- partial -->


<?php include "app/Views/menu_footer/footer.php"; ?>