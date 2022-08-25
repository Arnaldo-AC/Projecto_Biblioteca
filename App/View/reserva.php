<?php
SESSION_START();
require_once '../../src/vendor/autoload.php';
use App\Controller\emprestimo\insert;
use App\Controller\reserva\read;
use App\Controller\reserva\delete;
use App\Controller\reserva\download;
if($_SESSION['loginStatus']){

    $read = new read();

/*$deleteReserva = new delete();
$deleteReserva->remover();*/

$inserirEmp = new insert();
$inserirEmp->inserir();


include_once 'header.php';
?>
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
                    <li class="link  pag_atual">
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
                    <li class="link"  onmousemove="mudarCor1(4)" onmouseout="mudarCor2(4)">
                        <a href="emprestimo.php">
                        <div class="dentro">
                            <div class="icon">
                                <img class="icon-menu" src="./img/image-s4.png" alt="icone-produto">
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
            <body>
            <footer class="rodape-menu">
                MUKANDA
            </footer>
            </div>
            <!-- Aqui termina o meu lateral-->          
            <!-- Aqui inicia a area de apresentacao-->
            <div class="area-apresentacao ap-produtos">
                
                <section class="section-pag-produto">
                    <header>
                        <div class="cabecalho-section">
                        <h1 class="titulo-section">visualizar <span class="dif-style">reserva(s)</span></h1> 
                    </div>
                        
                    </header>
                    <div class="container-tabela">
                      <!--  <form action=""> !-->
                            <div class="box-input especial">
                                <input class="text-box" type="search" name="email" placeholder="Pesquisar..." id=""/>
                                <img class="img-lupa" src="img/icon-lupa.png" alt="">
                            </div>
                     <!--   </form> !-->
                    <table class="table table-hover table-responsive-md">
                        <thead>
                          <tr>
                            <th class="col-id" scope="col">#</th>
                            <th scope="col">Data Reserva</th>
                            <th scope="col">Comprovativo</th>
                            <th scope="col">Solicitante</th>
                            <th scope="col">Acções</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $result = $read->ler();
                        foreach($result as $dado)
                        {
                        ?>
                       
                        <tr>
                          <td><?=$dado['codReserva'];?></td>
                          <td><?=$dado['dataReserva'];?></td>
                          
                          <td><?=$dado['comprovativo'];?></td>
                         
                          <td><?=$dado['usuario'];?></td>
                          <td class="col-action">
                                <a href="validar-reserva.php?codReserva=<?=$dado['codReserva'];?>" class="btn-action">
                                            Validar
                                </a>    
                                <a href="upload.php" class="btn-action" >
                                            Eliminar
                                </a>
                                
                              </td>
                            </tr>
                            <?php
                              }
                              ?>
                        </tbody>
                      </table>
                    </div>
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