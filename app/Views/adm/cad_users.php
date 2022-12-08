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

    <a href="<?php echo URL . 'home/onShow' ?>" class="menu-link" title="Home"><i class="mdi mdi-home"></i></a>
    >
    <a  href="<?php echo URL . 'adm_user/onShow' ?>" class="menu-link"><span>CADASTRO DE USUARIO</span></a>
    
    <br>
    <br>
    <div class="card">
      <div class="card-header">
        <strong> CADASTRO DE USUARIO</strong>
      </div>
      <form class="forms-sample">
        <div class="card-body">

          <div class="row">
            <div class="col-sm-12 col-lg-12">
              <div class="form-group row ">
                <label for="validationCustom01" class="col-sm-12 text-left control-label col-form-label">Nome <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="validationCustom01" name="nome" value="<?php //echo $buscas['pChave'] ;
                                                                                                      ?>" placeholder="Nome" required>
                  <div class="invalid-feedback">
                    Digite se nome.
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-lg-8">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Email <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="email" class="form-control" id="email" name="email" value="<?php //echo $buscas['pChave'] ;
                                                                                          ?>" placeholder="Email" required>
                  <div class="invalid-feedback">
                    Digite seu Email
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 text-left control-label col-form-label">Telefone <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="telefone" name="telefone" value="<?php //echo $buscas['pChave'] ;
                                                                                                ?>" placeholder="Telefone" required>
                  <div class="invalid-feedback">
                    Digite seu Telefone
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-8 col-lg-8">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Endereço <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="endereco" name="endereco" value="<?php //echo $buscas['pChave'] ;
                                                                                                ?>" placeholder="Endereço" required>
                  <div class="invalid-feedback">
                    Digite seu Endereço
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-lg-4">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Bairro <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="bairro" name="bairro" value="<?php //echo $buscas['pChave'] ;
                                                                                            ?>" placeholder="Bairro" required>
                  <div class="invalid-feedback">
                    Digite seu Bairro
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-lg-12">
              <div class="form-group row ">
                <label for="validationCustom01" class="col-sm-12 text-left control-label col-form-label">Nome <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="validationCustom01" name="nome" value="<?php //echo $buscas['pChave'] ;
                                                                                                      ?>" placeholder="Nome" required>
                  <div class="invalid-feedback">
                    Digite se nome.
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-lg-8">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Email <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="email" class="form-control" id="email" name="email" value="<?php //echo $buscas['pChave'] ;
                                                                                          ?>" placeholder="Email" required>
                  <div class="invalid-feedback">
                    Digite seu Email
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 text-left control-label col-form-label">Telefone <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="telefone" name="telefone" value="<?php //echo $buscas['pChave'] ;
                                                                                                ?>" placeholder="Telefone" required>
                  <div class="invalid-feedback">
                    Digite seu Telefone
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-8 col-lg-8">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Endereço <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="endereco" name="endereco" value="<?php //echo $buscas['pChave'] ;
                                                                                                ?>" placeholder="Endereço" required>
                  <div class="invalid-feedback">
                    Digite seu Endereço
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-lg-4">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Bairro <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="bairro" name="bairro" value="<?php //echo $buscas['pChave'] ;
                                                                                            ?>" placeholder="Bairro" required>
                  <div class="invalid-feedback">
                    Digite seu Bairro
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-lg-12">
              <div class="form-group row ">
                <label for="validationCustom01" class="col-sm-12 text-left control-label col-form-label">Nome <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="validationCustom01" name="nome" value="<?php //echo $buscas['pChave'] ;
                                                                                                      ?>" placeholder="Nome" required>
                  <div class="invalid-feedback">
                    Digite se nome.
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-lg-8">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Email <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="email" class="form-control" id="email" name="email" value="<?php //echo $buscas['pChave'] ;
                                                                                          ?>" placeholder="Email" required>
                  <div class="invalid-feedback">
                    Digite seu Email
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 text-left control-label col-form-label">Telefone <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="telefone" name="telefone" value="<?php //echo $buscas['pChave'] ;
                                                                                                ?>" placeholder="Telefone" required>
                  <div class="invalid-feedback">
                    Digite seu Telefone
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-8 col-lg-8">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Endereço <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="endereco" name="endereco" value="<?php //echo $buscas['pChave'] ;
                                                                                                ?>" placeholder="Endereço" required>
                  <div class="invalid-feedback">
                    Digite seu Endereço
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-lg-4">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Bairro <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="bairro" name="bairro" value="<?php //echo $buscas['pChave'] ;
                                                                                            ?>" placeholder="Bairro" required>
                  <div class="invalid-feedback">
                    Digite seu Bairro
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-lg-12">
              <div class="form-group row ">
                <label for="validationCustom01" class="col-sm-12 text-left control-label col-form-label">Nome <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="validationCustom01" name="nome" value="<?php //echo $buscas['pChave'] ;
                                                                                                      ?>" placeholder="Nome" required>
                  <div class="invalid-feedback">
                    Digite se nome.
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-lg-8">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Email <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="email" class="form-control" id="email" name="email" value="<?php //echo $buscas['pChave'] ;
                                                                                          ?>" placeholder="Email" required>
                  <div class="invalid-feedback">
                    Digite seu Email
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 text-left control-label col-form-label">Telefone <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="telefone" name="telefone" value="<?php //echo $buscas['pChave'] ;
                                                                                                ?>" placeholder="Telefone" required>
                  <div class="invalid-feedback">
                    Digite seu Telefone
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-8 col-lg-8">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Endereço <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="endereco" name="endereco" value="<?php //echo $buscas['pChave'] ;
                                                                                                ?>" placeholder="Endereço" required>
                  <div class="invalid-feedback">
                    Digite seu Endereço
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-lg-4">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Bairro <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="bairro" name="bairro" value="<?php //echo $buscas['pChave'] ;
                                                                                            ?>" placeholder="Bairro" required>
                  <div class="invalid-feedback">
                    Digite seu Bairro
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </div>
      </form>

    </div>
  </div>
</div>


<?php require_once("app/Views/menu_footer/footer.php"); ?>