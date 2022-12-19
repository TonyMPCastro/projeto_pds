<?php


if (!defined('4578S9')) {
  header("Location: /");
  die("Erro: Página não encontrada!");
}

if (isset($this->dados['users'])) {
  $users = $this->dados['users'];
} else {
  $users = false;
}

$table = 1;

?>


<?php require_once("app/Views/menu_footer/menu.php"); ?>

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <a href="<?php echo URL . 'home/onShow' ?>" class="menu-link" title="Home"><i class="mdi mdi-home"></i></a>
    >
    <a href="<?php echo URL . 'adm_user/index' ?>" class="menu-link"><span>LISTAGEM DE USUARIOS</span></a>

    <br>
    <br>
    <div class="">
      <div class="card-header">
        <strong>Listagem de Usuarios</strong>
      </div>
      <br>
      <div class="text-center">
        <a href="<?php echo URL . 'adm_user/onShow' ?>" class="btn btn-outline-success btn-lg">CADASTRAR</a>
      </div>
      <br>
      <table id="example<?= $table; ?>" class="" style="width:100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Tipo</th>
            <th>Staus</th>
            <!-- <th>Id Tipo</th> -->
            <!-- <th>Id_user</th> -->
          </tr>
        </thead>
        <tbody>
          <?php if ($users) {
            foreach ($users as $user) { ?>
              <tr>
                <td style='font-size:28px'>
                  <a href="<?php echo URL . 'adm_user/onEdit?id_user=' . $user->id_user; ?>" title="Editar" data-toggle="popover" data-trigger="hover" data-content="Some content">
                    <i style="color:#0090e7;" class='mdi mdi-account-plus'></i>
                  </a>
                  &nbsp;&nbsp;&nbsp;
                  <!-- <a href="" title="Apagar" data-toggle="modal" data-target="#confirm<?= $user->id_user; ?>">
                    <i style="color:red;" class='mdi mdi-delete'></i>
                  </a> -->
                </td>
                <td><?= $user->nome_user; ?></td>
                <td><a style="font-size: 26px;" href="mailto:<?= $user->email ?>" title="Email"><i class="mdi mdi-email"></i></a></td>
                <td><?= $user->nome_tipo; ?></td>
                <td><?= ($user->status_user == 2) ? "Ativo" : "Desativado"; ?></td>
                <!-- <td><?= $user->id_tipo; ?></td> -->
                <!-- <td><?= $user->id_user; ?></td> -->
              </tr>


              <div class="modal fade" id="confirm<?= $user->id_user; ?>" role="dialog">
                <div class="modal-dialog modal-md">

                  <div class="modal-content">
                    <div class="modal-body">
                      <p> DESEJA REALMENTE FAZER ISSO?</p>
                    </div>
                    <div class="modal-footer">
                      <a href="<?php echo URL . 'adm_user/onDelete?id_user=' . $user->id_user; ?>" type="button" class="btn btn-danger" id="delete">Apagar Registo</a>
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
            <th>Email</th>
            <th>Tipo</th>
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




<?php require_once("app/Views/menu_footer/footer.php");
