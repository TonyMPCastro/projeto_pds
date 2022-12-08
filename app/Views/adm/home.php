<?php

if (!defined('4578S9')) {
  header("Location: /");
  die("Erro: Página não encontrada!");
}

?>

<?php include "app/Views/menu_footer/menu.php"; ?>


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
    <h5 class="mb-1 mb-sm-0"><i class="mdi mdi-home"></i></h5>

    </div>
</div>

<?php include "app/Views/menu_footer/footer.php"; ?>

<script>
   toastr.success("Hello World!");
</script>