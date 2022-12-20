<?php

if (!defined('4578S9')) {
  header("Location: /");
  die("Erro: Página não encontrada!");
}

if (isset($this->dados['user'])) {
  $user = $this->dados['user'];
} else {
  $user = [];
}


?>

<?php require_once("app/Views/menu_footer/menu.php"); ?>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">

    <a href="<?php echo URL . 'home/onShow' ?>" class="menu-link" title="Home"><i class="mdi mdi-home"></i></a>
    >
    <a href="<?php echo URL . 'adm_user/onShow' ?>" class="menu-link"><span>CADASTRO DE USUARIO</span></a>

    <br>
    <br>
    <div class="card">
      <div class="card-header">
        <strong> CADASTRO DE USUARIO</strong>
      </div>
      <form class="row g-3 needs-validation" method="POST" action="<?php echo URL . 'adm_user/onSave' ?>">
        <div class="card-body">

          <div class="row">
            <div class="col-sm-12 col-lg-12">
              <div class="form-group row ">
                <label for="validationCustom01" class="col-sm-12 text-left control-label col-form-label">Nome <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="validationCustom01" name="nome_user" value="<?php echo isset($user->nome_user) ? $user->nome_user : ""; ?>" placeholder="Nome" required>

                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-lg-8">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Email <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($user->email) ? $user->email : ""; ?>" placeholder="Email" required>

                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Telefone <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo isset($user->telefone) ? $user->telefone : ""; ?>" placeholder="Telefone" required>

                </div>
              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-sm-3 col-lg-3">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">CPF <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo isset($user->cpf) ? $user->cpf : ""; ?>" placeholder="CPF" required>
                </div>
              </div>
            </div>

            <div class="col-sm-3 col-lg-3">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Data Nascimento <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?php echo isset($user->data_nascimento) ? $user->data_nascimento : ""; ?>" placeholder="Data Nascimento" required>

                </div>
              </div>
            </div>

            <div class="col-sm-3 col-lg-3">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Senha <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="password" class="form-control" id="senha" name="senha" value="" placeholder="Senha" required>

                </div>
              </div>
            </div>
            <div class="col-sm-3 col-lg-3">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-12 text-left control-label col-form-label">Confirmação de Senha <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12 input-group has-validation">
                  <input type="password" class="form-control" id="senhac" name="senhac" value="" placeholder="Confirme sua Senha" required>

                </div>
              </div>
            </div>


          </div>

          <div class="row">
            <div class="col-sm-6 col-lg-6">
              <div class="form-group row ">
                <label for="validationCustom01" class="col-sm-12 text-left control-label col-form-label">Tipo Usuário <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12  has-validation">

                  <div class="form-check">
                    <input class="form-check-input" type="radio" id="tipo_user_id" name="tipo_user_id" value="1" required <?php echo isset($user->tipo_user_id) ? (($user->tipo_user_id == 1) ? 'checked' : '') : ""; ?>>
                    <label class="form-check-label" for="DESATIVADO">
                      ADMINISTRADOR
                    </label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="radio" id="tipo_user_id" name="tipo_user_id" value="2" required <?php  echo isset($user->tipo_user_id) ? (($user->tipo_user_id == 2) ? 'checked' : '') : ""; ?>>
                    <label class="form-check-label" for="ATIVADO">
                      CLIENTE
                    </label>
                  </div>


                  <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo isset($user->id_user) ? $user->id_user : ""; ?>">

                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-6">
              <div class="form-group row ">
                <label for="validationCustom01" class="col-sm-12 text-left control-label col-form-label">Status: <span style="color: red;" data-uw-styling-context="true">*</span></label>
                <div class="col-sm-12  has-validation">

                  <div class="form-check">
                    <input class="form-check-input" type="radio" id="status_user" name="status_user" value="1" required <?php echo isset($user->status_user) ? (($user->status_user == 1) ? 'checked' : '') : ""; ?>>
                    <label class="form-check-label" for="DESATIVADO">
                      DESATIVADO
                    </label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="radio" id="status_user" name="status_user" value="2" required <?php echo isset($user->status_user) ? (($user->status_user == 2) ? 'checked' : '') : ""; ?>>
                    <label class="form-check-label" for="ATIVADO">
                      ATIVADO
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
    <div class="card-footer text-center">
      <button type="submit"   onclick="return validarSenha()" class="btn btn-primary mr-2">SALVAR</button>
    </div>
    </form>
  </div>
</div>
</div>

<script>

let senha = document.getElementById('senha');
let senhaC = document.getElementById('senhac');

function validarSenha() {
  if (senha.value != senhaC.value) {
    senhaC.setCustomValidity("Senhas diferentes!");
    senhaC.reportValidity();
    return false;
  } else {
    senhaC.setCustomValidity("");
    return true;
  }
}

// verificar também quando o campo for modificado, para que a mensagem suma quando as senhas forem iguais
senhaC.addEventListener('input', validarSenha);

</script>


<?php require_once("app/Views/menu_footer/footer.php"); ?>