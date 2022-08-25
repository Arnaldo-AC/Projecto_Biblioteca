<?php
SESSION_START();

require_once '../../src/vendor/autoload.php';
use App\Controller\exemplar\read;
use App\Controller\carrinho\insert;

$read = new read();
$insertCarrinho = new insert();

$insertCarrinho->inserir();

$qtd = strlen($_SESSION['nomeUsuario']);
$c = 0;
for($i = 0; $i < $qtd; $i++)
{
    if(substr($_SESSION['nomeUsuario'],$qtd-$i,1) == " ")
    {
        $c = $qtd-$i;
        break;
    }
}
$nome = substr($_SESSION['nomeUsuario'],0,1);
$sobrenome = strtoupper(substr($_SESSION['nomeUsuario'],$c+1,1));
$apelido = $nome. '.'.$sobrenome;
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/grid.css"/>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css"/>
    <title>MUKANDA - Seja Bem-vindo!</title>
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
        <div id="carrossel">
            <div class="container container-texto-carrossel">
                    <h1 class="titulo1">
                        Seja bem-vindo
                    </h1>
                    <p class="frase1">
                        Encontre aqui os livros, artigos e revistas que procura!
                    </p>
                    <div class="area-btn"> 
                        <div class="borda-btn">
                        <a href="#" class="btnLink">
                            saiba Mais
                        </a>
                        </div>
                    </div>
            </div>
        </div>
        <section class="section-produtos">
            <h2 class="titulo2">
            Quais os beneficios da <span class="tandu-far">Leitura</span> ?
            </h2>
            <div class="bloco-motivos">
                <div class="dentro-cliente">
                    <ol>
                        <li class="motivo grid-1-3">
                            <span class="numero-motivo">1º</span> <span class="separador"></span>
                            <p class="texto-motivo">
                                Amplia o seu vocabulário:o aprendizado de novas palavras e termos, acarreta construção de um vocabulário amplo e rico  
                            </p>
                        </li>
                        <li class="motivo grid-1-3">
                            <span class="numero-motivo">2º</span> <span class="separador"></span>
                            <p class="texto-motivo">
                                Exercita sua inteligência: ler estimula a pensar sobre diversos assuntos, absorver novas opiniões e refletir sobre o que foi dito
                            </p>
                        </li>
                        <li class="motivo grid-1-3">
                            <span class="numero-motivo">3º</span> <span class="separador"></span>
                            <p class="texto-motivo">
                                Estimula sua criatividade: ao ler, imaginamos os cenários, as acções, os personagens e acessamos outro mundo
                            </p>
                        </li>
                    </ol>
                </div>
            </div>
        </section>
        <section class="section-produtos">
            <h2 class="titulo2">
                 exemplares disponíveis
            </h2>
            <div class="box-produtos container">
                <fieldset class="box-produtos container">
                    <legend>Livros</legend>
                    <div class="box-produtos container">
                    <?php

                        $tabela = $read->buscar6Ult("livro");
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

                    $tabela = $read->buscar6Ult("revista");
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

                    $tabela = $read->buscar6Ult("artigo");
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