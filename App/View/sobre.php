<?php

SESSION_START();

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
        <section class="section-sobre">
            <h1 class="titulo1-dif">
                 saiba mais sobre o mukanda
            </h1>
            <div class="">
                <div class="dentro-cliente">
                    <ol>
                        <li class="motivo">
                            <div class="chave">Em Geral</div> <span class="separador"></span>
                            <p class="texto">
                                A palavra <strong>MUKANDA</strong> é de origem <strong>Tchokwé</strong> e traduzindo em português é o termo <strong>Livro</strong>. Este nome surge
                                da necessidade de se referir aos livros e outros exemplares que compoêm uma Biblioteca.  
                            </p>
                        </li>
                        <li class="motivo missao">
                            <div class="chave">Sua Missão</div> <span class="separador"></span>
                            <p class="texto">
                                A Sua principal missão é controlar os empréstimos dos exemplares da Biblioteca. 
                            </p>
                        </li>
                        <li class="motivo">
                            <div class="chave">Sua Visão</div> <span class="separador"></span>
                            <p class="texto">
                            A Sua principal missão é oferecer a tempo e hora, com segurança os exemplares disponíveis, aos seus usuários...
                            </p>
                        </li>
                        <li class="motivo">
                            <div class="chave">Seus Valores</div> <span class="separador"></span>
                            <p class="texto">
                                Seus valores principais são as boas práticas no controle do empréstimo de exemplares e não recorrendo a atitudes que gerariam desconforto aos usuários.
                            </p>
                        </li>
                    </ol>
                </div>
            </div>
        </section>
    </main>
    <?php
    require_once "footer.php";
    ?>  
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
</body>
</html>