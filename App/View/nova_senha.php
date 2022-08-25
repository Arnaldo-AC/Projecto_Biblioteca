<?php
    // SESSION_START();
    require_once '../../src/vendor/autoload.php';
    use App\Controller\usuario\insert;
    
    $inserir = new insert();
    $inserir->inserir_codigo();

    // Email
   
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
                <div class="box-right">
                    <form id="formLogin" action="loginUsuario.php" method="post" style="width:700px;">
                        <div class="fazer-login" style="width:600px;">
                            Renovação de senha <br>
                            <span style="font-size:14px;background-color:#f00;padding:4px;color:#fff;margin-top:8px;margin-bottom:12px;display:inline-block;">
                                Verifique o seu e-mail, mandamos um código de recuperação.
                            </span>
                        </div>
                        <div style="width: 600px; display:flex;flex-wrap: wrap;justify-content:space-around;">
                            <div class="box-input">  
                                <input type="text" name="email1" value="<?=$_GET['email']?>" disabled/>
                                <input type="hidden" name="email" value="<?=$_GET['email']?>"/>
                                <label class="rotulo">Digite o seu e-mail</label>
                            </div>
                            <div class="box-input">  
                                <input type="text" name="codigo" id=""/>
                                <label class="rotulo">Digite o código de verificação</label>
                            </div>
                            <div class="box-input">  
                                <input type="password" name="senha" id=""/>
                                <label class="rotulo">Digite a nova senha</label>
                            </div>
                            <div class="box-input">  
                                <input type="password" name="senha1" id=""/>
                                <label class="rotulo">Digite novamente a senha</label>
                            </div>
                        </div>    
                        <button type="submit" class="btn-form">
                            enviar
                        </button>
                        
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>