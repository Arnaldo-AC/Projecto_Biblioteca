<?php
    session_start();
    if($_SESSION['loginStatus']){
?>
<!DOCTYPE html>
<html lag="pt-br">
    <head>
        <title>Dashboard - MUKANDA</title>
        <meta charset="ut-8"/>
        <link rel="stylesheet" href="css/reset.css"/>
        <link rel="stylesheet" href="css/grid.css"/>
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <main class="main-dashboard">
            <aside class="nav-dashboard">
                <div class="logo-aside">
                    <a href="dashboard.html">
                    <img src="img/logo.png" alt="">
                    </a>
                    <div class="linha"></div>
                </div>
                <div class="bloco-usuario">
                    <div class="foto-usuario"> 
                        <img class="foto-func" src="../../public/imagens/funcionarios/<?=$_SESSION['foto'] ?>" alt="foto funcionario">
                    </div>
                    <div class="nome-usuario">
                        <div id="nome">
                            <?=$_SESSION['nome']?>
                        </div>
                        <small><?=$_SESSION['nivel'] ?></small>
                    </div>
                    <div class="mais-opcoes">
                        <div class="dropdown show">
                                <button class="btn-drop btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">  
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                    <a class="dropdown-item desc-logout" href="login.php">
                                            <img src="img/log-out.png" alt=""> Sair
                                        </a>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div>
            <nav>
                <ul class="lista-links">
                    <li class="link" onmousemove="mudarCor1(0)" onmouseout="mudarCor2(0)">
                        <a href="exemplar.php">
                            <div class="dentro">
                                <div class="icon">
                                    <img class="icon-menu" src="./img/image-p0.png" alt="icone-produto">
                                </div>
                                <div class="descricao">
                                    EXEMPLAR
                                </div>
                            </div>
                        </a>        
                    </li>
                    <li class="link" onmousemove="mudarCor1(1)" onmouseout="mudarCor2(1)">
                        <a href="autor.php">
                            <div class="dentro">
                                <div class="icon">
                                    <img class="icon-menu" src="./img/image-p1.png" alt="icone-produto">
                                </div>
                                <div class="descricao">
                                    AUTOR
                                </div>
                            </div>
                        </a>    
                    </li>
                    <li class="link" onmousemove="mudarCor1(2)" onmouseout="mudarCor2(2)">
                        <a href="editora.php">
                        <div class="dentro">
                            <div class="icon">
                                <img class="icon-menu" src="./img/image-p2.png" alt="icone-produto">
                            </div>
                            <div class="descricao">
                                EDITORA
                            </div>
                        </div>
                    </a>
                    </li>
                    <li class="link" onmousemove="mudarCor1(3)" onmouseout="mudarCor2(3)">
                        <a href="reserva.php">
                        <div class="dentro">
                            <div class="icon">
                                <img class="icon-menu" src="./img/image-p3.png" alt="icone-produto">
                            </div>
                            <div class="descricao">
                            RESERVA
                            </div>
                        </div>
                    </a>
                    </li>
                    <li class="link" onmousemove="mudarCor1(4)" onmouseout="mudarCor2(4)">
                        <a href="emprestimo.php">
                        <div class="dentro">
                            <div class="icon">
                                <img class="icon-menu" src="./img/image-p4.png" alt="icone-produto">
                            </div>
                            <div class="descricao">
                            EMPRÉSTIMO
                            </div>
                        </div>
                    </a>
                    </li>
                    <li class="link" onmousemove="mudarCor1(5)" onmouseout="mudarCor2(5)">
                        <a href="usuario.php">
                        <div class="dentro">
                            <div class="icon">
                                <img class="icon-menu" src="./img/image-p5.png" alt="icone-produto">
                            </div>
                            <div class="descricao">
                                USUÁRIO
                            </div>
                        </div>
                    </a>
                    </li>
                    <li class="link" onmousemove="mudarCor1(6)" onmouseout="mudarCor2(6)">
                        <a href="funcionario.php">
                        <div class="dentro">
                            <div class="icon">
                                <img class="icon-menu" src="./img/image-p6.png" alt="icone-produto">
                            </div>
                            <div class="descricao">
                                FUNCIONÁRIO
                            </div>
                        </div>
                    </a>
                    </li>
                    <li class="link" onmousemove="mudarCor1(7)" onmouseout="mudarCor2(7)">
                        <a href="relatorio.php">
                        <div class="dentro">
                            <div class="icon">
                                <img class="icon-menu" src="./img/image-p7.png" alt="icone-produto">
                            </div>
                            <div class="descricao">
                                RELATÓRIO
                            </div>
                        </div>
                    </a>
                    </li>
                </ul>
            </nav>
            
            <footer class="rodape-menu">
                MUKANDA
            </footer>
            </aside>
            <div class="area-apresentacao">
                <h1 class="titulo">
                    seja bem-vindo...
                </h1>
                <div class="usuario">
                    <div class="foto">
                        <img src="../../public/imagens/funcionarios/<?=$_SESSION['foto']?>">
                    </div>
                    <div class="linha"></div> 
                    <div class="descricao-usuario">
                        <span class="nome"> <?=$_SESSION['nome'] ?></span> <span class="separador-vertical"></span> <span class="nivel"><?=$_SESSION['nivel'] ?></span>
                    </div>
                </div>
                <div class="data-hora">
                    <div class="data">
                        <img src="img/data.png" alt="">  <?=date("d/m/Y");?>
                    </div>
                    <div class="data">
                        <img src="img/clock.png" alt=""> 
                        11:23:45
                    </div>
                </div>
            </div>
        </main>
        
        <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
    </body>
</html>
<?php      
    } else header('Location: login.php');
?>