<?php
if (!defined('4578S9')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}
?>


<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
        <link rel="stylesheet" href="<?php echo URL . 'app/assets/css/stylesheet.css'; ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <title>Cadastro de Usuário</title>
    </head>
    <body>
        <div class="form">
            <div class="logo">
                <img src="<?php echo URL . 'app/assets/images/logo-derma.svg'; ?>" height="50" width="50" alt="">
            </div>
            <form id="formulario" action="">
                <div class="form-style">
                    <div class="form-title">
                        <img src="<?php echo URL . 'app/assets/images/log-in.svg'; ?>" alt="">
                        <h1>Faça seu cadastro</h1>
                    </div>
                    <p>Insira suas com suas informações para fazer o seu cadastro.</p>
                    <legend>Nome</legend>
                    <div class="form-group">
                        <img src="<?php echo URL . 'app/assets/images/mail-focus.svg'; ?>" id="mail" alt="" srcset="">
                        <input type="text" id="name" aria-label="email" placeholder="Digite seu nome completo">
                    </div>
                    <legend>E-mail</legend>
                    <div class="form-group">
                        <img src="<?php echo URL . 'app/assets/images/mail-focus.svg'; ?>" id="mail" alt="" srcset="">
                        <input type="email" id="email" aria-label="email" placeholder="Digite seu e-mail" autofocus onfocus="focusMail()" onblur="noFocus()">
                    </div>
                    <legend>Senha</legend>
                    <div class="form-group">
                        <img src="<?php echo URL . 'app/assets/images/lock.svg'; ?>" id="lock" alt="" srcset="">
                        <input type="password" id="password" aria-label="password" placeholder="Digite sua senha" onfocus="focusLock()"  onblur="noFocus()">
                        <img src="<?php echo URL . 'app/assets/images/eye.svg'; ?>" id="eye" alt="" srcset="">
                    </div>
                    <input style="opacity: 85%;" name="SendLogin" id="submitBtn" class="btn" type="submit" value="Cadastrar">

                    <div class="subscribe">
                        <p>Já tem uma conta?</p>
                        <strong><a href="<?php echo URL . "login/index"; ?>">Entrar</a></strong>
                    </div>
                </div>
            </form>
        </div>
        <div class="background-cadastro-usuario"></div>
    </body>
