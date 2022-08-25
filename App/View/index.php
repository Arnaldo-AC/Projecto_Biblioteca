<?php
SESSION_START();

require_once '../../src/vendor/autoload.php';
use App\Controller\exemplar\read;
use App\Controller\carrinho\insert;
$read = new read();
$insertCarrinho = new insert();

$insertCarrinho->inserir();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/grid.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <title>MUKANDA - Seja Bem-vindo!</title>
</head>
<body> 
    
    <header class="cabecalho">
        <div class="dentro-cliente">
            <div class="logo">
                <a href="index.php">
                <img src="img/logo-p.png" alt="logo">
                </a>
            </div>
            <nav class="links-nav">
                <ul>
                    <li>
                        <a href="index.php">
                        <span class="destaque">&lt;</span> Inicio <span class="destaque">&gt;</span>
                        </a>
                    </li>
                    <li>    
                        <a href="produtoscliente.php">
                          Exemplares
                        </a>
                    </li>
                    <li>
                        <a href="sobre.php">
                         Sobre
                        </a>
                    </li>
                </ul>
            </nav>
            <aside class="aside-cliente">
            <div class="bloco-pesquisa">
                <input type="search" name="pesquisa" id="box-search" placeholder="Digite o nome do exemplar desejado"/>
                <img class="lupa" src="img/icon-lupa.png" alt="">
            </div>
            <div class="periferico">
            <a href="loginUsuario.php">
                    <div class="logar">
                        <img src="img/log-in.png" alt=""> <span>Log in</span>
                    </div>
                </a>    
                <span class="separador-vertical"></span>
                <a href="cadastro_usuario.php">
                    <div class="logar">
                        <img src="img/icon-add-user.png" alt="">
                    </div>
                </a>
            </div>
        </aside>
        </div>
    </header>
    <main>
        <div id="carrossel">
            <div class="container container-texto-carrossel">
                    <h1 class="titulo1">
                        Seja bem-vindo
                    </h1>
                    <p class="frase1">
                        Encontre aqui os exemplares, revistas e artigos que procura!
                    </p>
                    <div class="area-btn"> 
                        <a href="#" class="btnLink">
                            saiba Mais
                        </a>
                    </div>
            </div>
        </div>
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
        
        </section>
    </main>
    <footer class="rodape">
        <div class="container">
            <div class="box-sobre-footer grid-1-3">
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                     error odio consequuntur. error odio consequuntur. error odio consequuntur. error odio consequuntur.
                </p>
            </div>
            <div class="box-logo-footer grid-1-3">
                <img src="img/logo.png" alt="logo-tandufar">
            </div>
            <div class="box-contato-footer grid-1-3">
                <p>Entre em contato connosco</p>
                <ul>
                    <li>- +244 924 281 192</li>
                    <li>- +244 994 281 192</li>
                    <li>- contatotandufar@gmail.com</li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>