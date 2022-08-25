<?php
    // SESSION_START();
    require_once '../../src/vendor/autoload.php';
    use App\Controller\usuario\recuperar;
    
    try
    {
        $inserir = new recuperar();
        $inserir->verificar();
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
        <link rel="stylesheet" href="css/grid.css"/>
        <link rel="stylesheet" href="css/loginStyle.css"/>
    </head>
    <body>
        <main class="box-main">
                <div class="box-right grid-8">
                    <form id="formLogin" action="nova_senha.php" method="post">
                        <div class="fazer-login">
                            Recuperação de senha
                        </div>
                        <div class="box-input">
                     <!--  <div class="alert alert-warning" role="alert">
                        A simple warning alert—check it out!
                        </div>!-->  
                            <input type="email" name="email" id=""/>
                            <label class="rotulo">Digite o seu e-mail</label>
                        </div>
                        <button type="submit" class="btn-form">
                            enviar
                        </button>
                        <a href="#" class="pergunta">Verifique seu e-mail!</a>
                        
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>