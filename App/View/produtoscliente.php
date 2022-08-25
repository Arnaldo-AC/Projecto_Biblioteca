<?php
SESSION_START();

require_once '../../src/vendor/autoload.php';
use App\Controller\exemplar\read;
use App\Controller\carrinho\insert;

try{
    $read = new read();
$insertCarrinho = new insert();

$insertCarrinho->inserir();
}

catch(Exception $erro)
{
    
}

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/grid.css"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <title>Seja Bem-vindo!</title>
</head>
<body> 
<?php
if(isset($_SESSION['loginStatusUsuario'])) {
    require_once "headerLogado.php";    
} else{
    require_once "headerSimples.php";
}    
?>
    <main>
        <section class="section-produto">
            <h1 class="titulo1-dif">
                 todos os exemplares disponíveis
            </h1>
            <div class="box-produtos container">
                <fieldset class="box-produtos container">
                    <legend>Livros</legend>
                    <div class="box-produtos container">
                    <?php

                        $tabela = $read->buscarTodos("livro");
                        foreach($tabela as $linha)
                        {
                        ?>
                        <div class="box-produto">
                            <div class="img-produto">
                            <img src="../../public/imagens/exemplares/<?=$linha['foto'];?>" alt="" class="img-produto">
                            </div>
                            <div class="box-nome-produto">
                                <?=$linha['titulo']?>
                                <div class="box-ori-prod">
                                <span class="origem">Edição:</span>  <?=$linha['edicao']?>
                                </div>
                            </div>
                            <div class="box-desc-prod">
                            <?php
                            if (isset($_SESSION['idUsuario']) && isset($_SESSION['loginStatusUsuario'])) {
                               ?>
                            <form action="" method="post">
                            <input type="hidden" name="idExemplar" value="<?=$linha['codExemplar']?>">
                            <input type="hidden" name="idUsuario" value="<?=$_SESSION['idUsuario']?>">
                                <button class="btn-add-car">
                                    Add no carrinho
                                </button>
                                </form>
                                <?php
                                    } else{
                                    ?>
                                <button class="btn-add-car">
                                    Add no carrinho
                                </button>

                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php 
                        }
                        ?>
                </div>

                </fieldset>
            </div>

            <div class="box-produtos container">
            <fieldset class="box-produtos container">
                <legend>Revistas</legend>
                <div class="box-produtos container">
                <?php

                    $tabela = $read->buscarTodos("revista");
                    foreach($tabela as $linha)
                    {
                    ?>
                    <div class="box-produto">
                        <div class="img-produto">
                        <img src="../../public/imagens/exemplares/<?=$linha['foto'];?>" alt="" class="img-produto">
                        </div>
                        <div class="box-nome-produto">
                            <?=$linha['titulo']?>
                            <div class="box-ori-prod">
                            <span class="origem">Edição:</span>  <?=$linha['edicao']?>
                            </div>
                        </div>
                        <div class="box-desc-prod">
                        <?php
                            if (isset($_SESSION['idUsuario']) && isset($_SESSION['loginStatusUsuario'])) {
                               ?>
                            <form action="" method="post">
                            <input type="hidden" name="idExemplar" value="<?=$linha['codExemplar']?>">
                            <input type="hidden" name="idUsuario" value="<?=$_SESSION['idUsuario']?>">
                                <button class="btn-add-car">
                                    Add no carrinho
                                </button>
                                </form>
                                <?php
                                    } else{
                                    ?>
                                <button class="btn-add-car">
                                    Add no carrinho
                                </button>

                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php 
                        }
                        ?>
            </div>
            </fieldset>
            </div>
            <div class="box-produtos container">
            <fieldset class="box-produtos container">
                <legend>Artigos</legend>
                <div class="box-produtos container">
                <?php

                    $tabela = $read->buscarTodos("artigo");
                    foreach($tabela as $linha)
                    {
                    ?>
                    <div class="box-produto">
                        <div class="img-produto">
                        <img src="../../public/imagens/exemplares/<?=$linha['foto'];?>" alt="" class="img-produto">
                        </div>
                        <div class="box-nome-produto">
                            <?=$linha['titulo']?>
                            <div class="box-ori-prod">
                            <span class="origem">Edição:</span>  <?=$linha['edicao']?>
                            </div>
                        </div>
                        <div class="box-desc-prod">
                        <?php
                            if (isset($_SESSION['idUsuario']) && isset($_SESSION['loginStatusUsuario'])) {
                               ?>
                            <form action="" method="post">
                            <input type="hidden" name="idExemplar" value="<?=$linha['codExemplar']?>">
                            <input type="hidden" name="idUsuario" value="<?=$_SESSION['idUsuario']?>">
                                <button class="btn-add-car">
                                    Add no carrinho
                                </button>
                                </form>
                                <?php
                                    } else{
                                    ?>
                                <button class="btn-add-car">
                                    Add no carrinho
                                </button>

                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php 
                        }
                        ?>
            </div>
            </fieldset>
                    </div>
        </section>
    </main>
    <?php
    require_once "footer.php";
    ?>  
    <script type="text/javascript" src="js/bootstrap.bundle.js"></script>  
</body>
</html>