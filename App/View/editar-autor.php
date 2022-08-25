<?php
SESSION_START();
require_once '../../src/vendor/autoload.php';
use App\Controller\autor\update;

if($_SESSION['loginStatus']){

    $alterar = new update();
    $alterar->alterar($_GET['codAutor']);
    $read = new update();
?>
<!DOCTYPE html>
<html lag="pt-br">
    <head>
        <title>Dashboard - Autor</title>
        <meta charset="ut-8"/>
        <link rel="stylesheet" href="css/reset.css"/>
        <link rel="stylesheet" href="css/grid.css"/>
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
     
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body area-apresentacao ap-produtos">   
                    
            
        </div>
        
      </div>
    </div>
  </div>
        <main class="main-dashboard">
            <!-- Aqui inicia o meu lateral-->
            <div class="nav-dashboard menu">
                <div class="logo-aside">
                    <a href="dashboard.html">
                    <img src="img/logo.png" alt="">
                    </a>
                    <div class="linha"></div>
                </div>
                <div class="bloco-usuario">
                    <div class="foto-usuario">
                        <img class="foto-func"src="img/caplas.jpg" alt="foto funcionario">
                    </div>
                    <div class="nome-usuario">
                        <div id="nome"><?=$_SESSION['nome'] ?></div>
                        <small><?=$_SESSION['nivel'] ?></small>
                    </div>
                    <div class="mais-opcoes">
                        <div class="dropdown show">
                            <button class="btn-drop btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">  
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item desc-logout" href="login.html">
                                   <img src="img/log-out.png" alt=""> Sair
                                </a></li>
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
                    <li class="link pag_atual" >
                        <a href="autor.php">
                            <div class="dentro">
                                <div class="icon">
                                    <img class="icon-menu" src="./img/image-s1.png" alt="icone-produto">
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
                    <li class="link" onmousemove="mudarCor1(4)" onmouseout="mudarCor2(4)">
                    <a href="funcionario.php">
                        <div class="dentro">
                            <div class="icon">
                                <img class="icon-menu" src="./img/image-p5.png" alt="icone-produto">
                            </div>
                            <div class="descricao">
                                FUNCIONÁRIO
                            </div>
                        </div>
                    </a>
                    </li>
                    <li class="link" onmousemove="mudarCor1(6)" onmouseout="mudarCor2(6)">
                        <a href="relatorio.php">
                        <div class="dentro">
                            <div class="icon">
                                <img class="icon-menu" src="./img/image-p6.png" alt="icone-produto">
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
            </div>
            <!-- Aqui termina o meu lateral-->          
            <!-- Aqui inicia a area de apresentacao-->
            <div class="area-apresentacao ap-produtos">
                
                <section class="section-pag-produto section-cad-cliente">
                    <header class="cabecalho-section">
                        <h1 class="titulo-section">edição <span class="dif-style">autor</span> </h1>
                    </header>
                    <form class="form-principal" action="" method="post">
                    <?php
                          $buscar = $read->ler($_GET['codAutor']);
                          foreach($buscar as $dado)
                          {
                        ?>
                        <div class="subform">
                            <div class="box-input">
                                <input class="text-box"  value="<?=$dado['nome']?>" type="text" name="nome" id=""/>
                                <label class="rotulo">Nome do autor</label>
                            </div>
                            <div class="box-input">
                                <input class="text-box" value="<?=$dado['nacionalidade']?>" type="text" name="nacionalidade" id=""/>
                                <label class="rotulo">Nacionalidade do autor</label>
                            </div>
                            <div class="box-input">
                                <input class="text-box" value="<?=$dado['areaFormacao']?>" type="text" name="area" id=""/>
                                <label class="rotulo">Área de formação</label>
                            </div>
                            <div class="box-input">
                                <input class="text-box" value="<?=$dado['cargo']?>" type="text" name="cargo" id=""/>
                                <label class="rotulo">Cargo do autor</label>
                            </div>
                            <div class="box-input">
                                <select name="genero" id="">
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>
                                <label class="rotulo">Genero do autor</label>
                            </div>
                            <div class="box-input">
                                <input class="text-box" value="<?=$dado['dataNasc']?>" type="date" name="dataNasc" id=""/>
                                <label class="rotulo">Data de nascimento</label>
                            </div>
                        <?php
                    }
                    ?>
                        </div>
                        <button type="submit" class="btn-submit" class="btn-salvar">
                            <img src="./img/icon-save.png" alt="" class="img-save"/> <span> Salvar</span>
                        </button>
                    </form>
                </section>
            </div>
        </main>
        <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
    </body>
</html>
<?php      
    } else header('Location: login.php');
?>