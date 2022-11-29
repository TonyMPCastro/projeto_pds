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
<link rel="stylesheet" href="<?php echo URL . 'app/assets/css/stylesheet.css'; ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="shortcut icon" href="<?php echo URL . 'assets/images/favicon.ico'; ?>" type="image/x-icon">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="container">

      <div class="card">
          <div class="card-body">
            <div class="row mt-2">

              <div class="col-md-12 align-middle">
                <h3><i class="fas fa-file-alt"></i>&nbsp; Cadastar Produto </h3>
              </div>
            </div>
            <h3 class="text-center"></h3>
            <form class="form-horizontal r-separator" method="post" action="<?php if (isset($produtoEdit)) {
                                                                              echo URL . 'Home/onUpdate';
                                                                            } else {
                                                                              echo URL . 'Home/onInsert';
                                                                            } ?>">
              <div class="card-body">
                <div class="row">

                  <div class="col-sm-10 col-lg-5">
                    <div class="form-group row p-t-15">
                      <label for="input2" class="col-sm-2 text-left control-label col-form-label">Produto:</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="produto" name="produto" value="<?php if (isset($produtoEdit)) {
                                                                                                      echo $produtoEdit['nome'];
                                                                                                    } ?>" placeholder="">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-10 col-lg-5">
                    <div class="form-group row p-t-15">
                      <label for="input2" class="col-sm-2 text-left control-label col-form-label">Cor:</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="cor" name="cor" value="<?php if (isset($produtoEdit)) {
                                                                                              echo $produtoEdit['cor'];
                                                                                            } ?>" <?php if (isset($produtoEdit)) {
                                                                                                                            echo 'disabled';
                                                                                                                          } ?> placeholder="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-10 col-lg-5">
                    <div class="form-group row p-t-15">
                      <label for="input3" class="col-sm-2 text-left control-label col-form-label">Preço:</label>
                      <div class="col-sm-8">
                        <input type="number" step=".01" class="form-control" id="precoP" name="precoP" value="<?php if (isset($produtoEdit)) {
                                                                                                                echo $produtoEdit['preco'];
                                                                                                              } ?>" placeholder="">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-lg-12">
                    <div class="form-group row p-t-15">
                      <div class="col-sm-10 col-lg-12">
                        <input type="hidden" class="form-control" id="idP" name="idP" value="<?php if (isset($produtoEdit)) {
                                                                                                echo $produtoEdit['idProduto'];
                                                                                              } ?>" placeholder="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12 col-lg-12">
                    <button type="submit" class="btn btn-outline-success col-sm-12">INSERIR</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>

<?php require_once("app/Views/menu_footer/footer.php"); ?>