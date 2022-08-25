<?php
    // SESSION_START();
    require_once '../../src/vendor/autoload.php';
    use App\Controller\usuario\loginUsuario;
    use App\Controller\usuario\recuperar;
    use App\Controller\usuario\insert;

    try
    {
        
    $login = new loginUsuario();
    $login->autenticar();   

    $recuperar = new recuperar();
    $recuperar->verificar();
    }
    catch(Exception $erro)
    {
        
    }


?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8"/>
        <title>MUKANDA - Login</title>
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <link rel="stylesheet" href="css/grid.css"/>
        <link rel="stylesheet" href="css/loginStyle.css"/>
    </head>
    <body>
        <main class="box-main">
                <div class="box-right grid-8">
                    <form id="formLogin" action="" method="post">
                        <div class="fazer-login">
                            Fazer Login
                        </div>
                        <div class="box-input">
                     <!--  <div class="alert alert-warning" role="alert">
                        A simple warning alert—check it out!
                        </div>!-->  
                            <input type="text" name="email" id=""/>
                            <label class="rotulo">Digite o seu e-mail</label>
                        </div>
                        <div class="box-input">
                            <input type="password" name="senha" id=""/>
                            <label class="rotulo">Digite a sua senha</label>
                        </div>
                        <div class="alert alert-danger" role="alert" style="display:none;">
                            E-mail e/ou senha incorreto!
                        </div>
                        <button type="submit" class="btn-form">
                            entrar
                        </button>
                        <a href="esquecer-senha.php" class="pergunta">Você esqueceu a sua Senha?</a>
                        
                    </form>
                </div>
            </div>
        </main>
        <script type="text/javascript" src="js/jquery.js"></script>
        <?php
            if(isset($_SESSION['erroLoginUser'])){
            if($_SESSION['erroLoginUser']>0){
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