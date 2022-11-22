<?php

if (!defined('4578S9')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

//Criptografar a senha
//echo password_hash(4578S9, PASSWORD_DEFAULT);

if (isset($this->dados['form'])) {
    $valorForm = $this->dados['form'];
}
?>




<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo URL . 'app/css/bulma.min.css'; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo URL . 'app/css/login.css'; ?>">
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://www.google.com/recaptcha/enterprise.js?render=6LcIVeoiAAAAAPrRT4fyEBxgquzV84-htLD5bpXp"></script>

    <style>
        .form-group .glyphicon-eye-open {
            pointer-events: auto;
        }

        .form-group .glyphicon-eye-open:hover {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    
                    <?php
                    if (isset($_SESSION['nao_autenticado'])) :
                    ?>
                        <div class="notification is-danger">
                            <p>ERRO: Usuário ou senha inválidos.</p>
                        </div>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
                    <div class="box">
                        <h3 class="title has-text" style="color: black;">Login</h3>
                        <form action="" class="form-signin" method="POST">
                            <div class="field">
                                <div class="control">
                                    <label>Usuário</label>
                                    <input name="usuario" class="input is-large" type="text" placeholder="Digite o usuário" value="<?php if (isset($valorForm['usuario'])) {
                                                                                                                                    } ?>"><br><br>
                                </div>
                            </div>

                            <div class="field">
                                <div class="form-group">

                                    <div class="control">
                                        <label>Senha</label>

                                        <input name="senha" id="txtSenha" class="input is-large" type="password" placeholder="Digite a senha">
                                        <p>Esqueceu a senha?</p>
                                        <span id="spnMostrarSenha" class="glyphicon glyphicon glyphicon-eye-open form-control-feedback"> </span>


                                    </div>

                                </div> 
                        
                                <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LeLQ_ciAAAAAEhJBnV7BRgz3l5XwwNRWuUCHr5n"></div>

                            </div>


                            <input name="SendLogin" id="submitBtn" class="button is-block is-link is-large is-fullwidth" type="submit" value="Acessar"><br>
                        </form>
                        <a class="button is-block is-success is-large is-fullwidth" href="<?php echo URL . "cadastrar/index"; ?>">Cadastrar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>


        document.getElementById("submitBtn").disabled = true;

        function recaptchaCallback() {

           // console.log(document.getElementsByName('g-recaptcha-response'));
            document.getElementById("submitBtn").disabled = false;
        }

        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
<script>
    var $spnMostrarSenha = $('#spnMostrarSenha');
    var $txtSenha = $('#txtSenha');

    $spnMostrarSenha
        .on('mousedown mouseup', function() {
            var inputType = $txtSenha.attr('type') == 'password' ? 'text' : 'password';
            $txtSenha.attr('type', inputType);
        })
        .on('mouseout', function() {
            $txtSenha.attr('type', 'password');
        });
</script>