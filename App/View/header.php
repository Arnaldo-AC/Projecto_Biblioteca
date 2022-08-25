<!DOCTYPE html>
<html lag="pt-br">
    <head>
        <title>Dashboard - MUKANDA </title>
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
                        <img class="foto-func"src="../../Public/Imagens/funcionarios/<?=$_SESSION['foto'] ?>" alt="foto funcionario">
                    </div>
                    <div class="nome-usuario">
                        <div id="nome"><?=$_SESSION['nome'] ?></div>
                        <small><?=$_SESSION['nivel']; ?></small>
                    </div>
                    <div class="mais-opcoes">
                        <div class="dropdown show">
                            <button class="btn-drop btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">  
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li> <a class="dropdown-item desc-logout" href="login.php">
                                            <img src="img/log-out.png" alt=""> Sair
                                        </a>
                            </ul>
                          </div>
                    </div>
                </div>