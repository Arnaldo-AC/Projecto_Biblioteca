<?php
    SESSION_START();
    require_once '../../src/vendor/autoload.php';
    use App\Controller\usuario\recuperar;
    use App\Controller\usuario\read;
    use App\Controller\usuario\insert;

    $read = new read();
    
    try
    {
        $inserir = new recuperar();
        $inserir->verificar();
    
        // Email
    
        $inserir = new insert();
        $inserir->inserir(); 
    }
    catch(Exception $erro)
    {
        
    }
   
   
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8"/>
        <title>Tandu-far II - Login</title>
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <link rel="stylesheet" href="css/grid.css"/>
        <link rel="stylesheet" href="css/loginStyle.css"/>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <main class="box-main">
        <section class="section-pag-produto section-cad-cliente" style="background-color:#fff;box-shadow: 0px 0px 15px #fff;"> 
                    <header class="cabecalho-section">
                        <h1 class="titulo-section">cadastre-se </h1> 
                        <div class="alert alert-success" role="alert" style="display:none;width:300px;padding: 8px; margin: 0 0 0 12px;position:absolute;left:180px;">
                            Dados cadastrados com sucesso!
                        </div>
                    </header>
                    <form class="form-principal" action="#" method="post" enctype="multipart/form-data">
                            <div class="subform">
                                <div class="box-input">
                                    <input class="text-box" type="text" name="nome" id=""/>
                                    <label class="rotulo">Nome do usuário</label>
                                </div>
                                <div class="box-input">
                                    <input class="text-box" type="text" name="bi" id=""/>
                                    <label class="rotulo">BI do usuário</label>
                                </div>
                                <div class="box-input">
                                    <select name="genero" id="">
                                        <option value="M">Masculino</option>
                                        <option value="F">Feminino</option>
                                    </select>
                                    <label class="rotulo">Genero do usuário</label>
                                </div>
                                <div class="box-input">
                                    <input class="text-box" type="date" name="dataNasc" id=""/>
                                    <label class="rotulo">Data de nascimento</label>
                                </div>
                                <div class="box-input">
                                    <input class="text-box" type="text" name="telefone" id=""/>
                                    <label class="rotulo">Telefone do usuário</label>
                                </div>
                                <div class="box-input">
                                    <input class="text-box" type="email" name="email" id="" required/>
                                    <label class="rotulo">E-mail do usuário</label>
                                </div>
                                <div class="box-input">
                                    <input class="text-box" type="text" name="municipio" id=""/>
                                    <label class="rotulo">Municipio do usuário</label>
                                </div>
                                <div class="box-input">
                                    <input class="text-box" type="text" name="distrito" id=""/>
                                    <label class="rotulo">Distrito do usuário</label>
                                </div>
                                <div class="box-input">
                                    <input class="text-box" type="text" name="bairro" id=""/>
                                    <label class="rotulo">Bairro do usuário</label>
                                </div>
                                <div class="box-input">
                                    <input class="text-box" type="password" name="senha" id="" required/>
                                    <label class="rotulo">Senha do usuário</label>
                                </div>
                                <div class="box-input">
                                    <input class="text-box" type="text" name="numUsuario" id=""/>
                                    <label class="rotulo">Número do usuário</label>
                                </div>
                                <div class="box-input">
                                    <input class="text-box" type="text" name="curso" id=""/>
                                    <label class="rotulo">Curso do usuário</label>
                                </div>
                                <div class="box-input">
                                    <select name="idNivel" id="">
                                    <?php
                                    $niveis = $read->buscarNivel();
                                    foreach($niveis as $nivel){   
                                ?> 
                                    <option value="<?=$nivel['codNivel'];?>"><?=$nivel['descricao'];?></option>
                                <?php
                                    }
                                ?>
                                    </select>
                                    <label class="rotulo">Tipo de usuário</label>
                                </div>
                            </div>
                            <div style="flex-grow: 1;">
                                <div class="box-img">
                                    <img src="img/picture2.png" alt="" id="image1">
                                    <input class="text-box" type="file" name="foto" id="btn-add-file">
                                </div>
                                <p style="padding:8px 12px;color:#a2a2a2;">Click no ícone acima para add uma img</p>
                            </div>
                            <button type="submit" class="btn-submit" class="btn-salvar" style="top:20px;">
                                <img src="./img/icon-save.png" alt="" class="img-save"/> <span> Salvar</span>
                            </button>
                        </form> 
                </section>
        </main>
        <script type="text/javascript" src="script.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <?php
            if(isset($_SESSION['statusSave'])){
            if($_SESSION['statusSave']){
        ?>
            <script>
                    $("div.alert").fadeIn(1000).fadeOut(6000);

            </script>
        <?php
            }
        }
        ?>
    </body>
   
</html>