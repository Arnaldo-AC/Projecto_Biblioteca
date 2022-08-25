<?php
     SESSION_START();
    require_once '../../src/vendor/autoload.php';
    use App\Controller\funcionario\login;
    $login = new login();
    $login->autenticar();   
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8"/>
        <title>Mukanda - Login</title>
        <link rel="stylesheet" href="css/bootstrap.css"/>   
        <link rel="stylesheet" href="css/grid.css"/>
        <link rel="stylesheet" href="css/loginStyle.css"/>
    </head>
    <body>
        <main id="main-area">
            
            <div id="mainBox" class="container">
                <div class="box-left grid-8">
                    <div class="frase-login">
                        Faça o seu login para ter acesso ao painel de controle
                    </div>
                </div>
                <div class="box-right grid-8">
                    <form id="formLogin" action="" method="post">
                        <div class="box-logo">
                            <img src="img/logo.png"/>
                        </div>
                    <div class="alert alert-danger" role="alert" style="display:none;">
                        E-mail e/ou senha incorreto!
                    </div>
            
                        <div class="box-input">
                            <input class="text-box" type="text" name="email" id=""/>
                            <label class="rotulo">Digite o seu e-mail</label>
                        </div>
                        <div class="box-input">
                            <input class="text-box" type="password" name="senha" id=""/>
                            <label class="rotulo">Digite a sua senha</label>
                        </div>
                        <button type="submit" class="btn-form">
                            <img src="img/log-in.png" alt=""> <span class="f-entrar">entrar</span> 
                        </button>
                        <a href="#" class="pergunta">Você esqueceu a sua Senha?</a>
                    </form>
                </div>
            </div>
        </main>
        <script type="text/javascript" src="js/jquery.js"></script>
        <?php
            if(isset($_SESSION['erroLogin'])){
            if($_SESSION['erroLogin']>0){
        ?>
            <script>
                    $("div.alert").fadeIn(1000)

            </script>
        <?php
            }
        }
        ?>
    </body>
</html>