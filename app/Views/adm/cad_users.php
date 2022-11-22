<?php

if (!defined('4578S9')) {
  header("Location: /");
  die("Erro: Página não encontrada!");
}

if (isset($this->dados['user'])) {
  $user = $this->dados['user'];
}


if (isset($this->dados['mode'])) {
  $mode = $this->dados['mode'];
}



?>

<?php require_once("app/Views/menu_footer/menu.php"); ?>


<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <h1 class="mb-1 mb-sm-0">CAD USERS - MODE : <?= $mode;?></h1>
  <?=json_encode($user)?>
  </div>
</div>

<?php require_once("app/Views/menu_footer/footer.php"); ?>
