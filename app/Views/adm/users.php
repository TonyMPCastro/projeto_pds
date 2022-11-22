<?php

if (!defined('4578S9')) {
  header("Location: /");
  die("Erro: Página não encontrada!");
}

if (isset($this->dados['users'])) {
  $users = $this->dados['users'];
}

?>

<?php require_once("app/Views/menu_footer/menu.php"); ?>

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <h1 class="mb-1 mb-sm-0">USERS</h1>



    <table id="example" class="" style="width:100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Nome</th>
          <th>Tipo</th>
          <th>Staus</th>
          <th>Id Tipo</th>
          <th>Id_user</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user) { ?>
          <tr>
            <td style='font-size:28px'>
              <a href="<?php echo URL . 'adm_user/onEdit?id_user=' . $user->id_user; ?>" title="Editar" data-toggle="popover" data-trigger="hover" data-content="Some content">
                <i style="color:#0090e7;" class='mdi mdi-account-plus'></i>
              </a>
              &nbsp;&nbsp;&nbsp;
              <a  data-confirm="<?= $user->id_user ?>" title="Apagar" data-toggle="popover" data-trigger="hover" data-content="Some content">
                <i style="color:red;" class='mdi mdi-delete'></i>
              </a>
            </td>
            <td><?= $user->nome_user; ?></td>
            <td><?= $user->nome_tipo; ?></td>
            <td><?= $user->status_user; ?></td>
            <td><?= $user->id_tipo; ?></td>
            <td><?= $user->id_user; ?></td>
          </tr>
        <?php  }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th>#</th>
          <th>Nome</th>
          <th>Tipo</th>
          <th>Staus</th>
          <th>Id Tipo</th>
          <th>Id_user</th>
        </tr>
      </tfoot>
    </table>


  </div>
</div>

<?php require_once("app/Views/menu_footer/footer.php"); ?>



<script>
  $(document).ready(function() {
    $('#example').DataTable({

    });


  });
</script>
