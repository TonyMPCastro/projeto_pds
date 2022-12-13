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
?>
<?php include "app/Views/menu_footer/menu.php"; 

?>

<pre>

<!--Antonio que não sabe php -->
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
              <tr>
                <td style='font-size:28px'>
                  <a href="<?php echo URL . 'servico_adm/onEdit?id=' . $servico->id; ?>" title="Editar" data-toggle="popover" data-trigger="hover" data-content="Some content">
                    <i style="color:#0090e7;" class='mdi mdi-account-plus'></i>
                  </a>
                  &nbsp;&nbsp;&nbsp;
                  <a href="#" title="Apagar" data-toggle="modal" data-target="#confirm">
                    <i style="color:red;" class='mdi mdi-delete'></i>
                  </a>
                </td>
                <td><?= $servico->nome; ?></td>
                <td><?= $servico->valor; ?></td>
                <td><?= ($servico->status == 2) ? "Ativo" : "Desativado"; ?></td>
              </tr>
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

print_r($lista_em_abertas)
?>

</pre>

<!-- partial -->


<?php include "app/Views/menu_footer/footer.php"; ?>