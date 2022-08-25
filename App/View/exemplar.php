<?php
SESSION_START();

require_once '../../src/vendor/autoload.php';
use App\Controller\exemplar\insert;
use App\Controller\exemplar\read;
use App\Controller\exemplar\delete;

if($_SESSION['loginStatus']){

$remover = new delete();
$remover->remover();

$inserir = new insert();
$inserir->inserir();

$read = new read();
$categorias = $read->buscarCategorias();
include_once 'header.php';
?>
            <nav>
                <ul class="lista-links">
                    <li class="link pag_atual" onmousemove="mudarCor1(0)" onmouseout="mudarCor2(0)">
                        <a href="exemplar.php">
                            <div class="dentro">
                                <div class="icon">
                                    <img class="icon-menu" src="./img/image-s0.png" alt="icone-produto">
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
                
                <section class="section-pag-produto">
                    <header>
                        <div class="cabecalho-section"> 
                            <h1 class="titulo-section">visualizar <span class="dif-style">exemplares</span></h1>
                        </div>
                    </header>
                    <div class="container-tabela">
                        <form action="">
                            <div class="box-input especial">
                                <input class="text-box" type="search" name="email" placeholder="Pesquisar..." id=""/>
                                <img class="img-lupa" src="img/icon-lupa.png" alt="">
                            </div>
                        </form>
                    <table class="table table-hover table-responsive-md">
                        <thead>
                            <tr>
                              <th class="col-id" scope="col">Código</th>
                              <th scope="col">Título</th>
                              <th scope="col">Deposito Legal</th>
                              <th scope="col">Ano de publicação</th>
                              <th scope="col">ISBN</th>
                              <th scope="col">Edição</th>
                              <th scope="col">Medida</th>
                              <th scope="col">Categoria</th>
                              <th scope="col">Editora</th>
                              <th scope="col">Quantidade</th>
                              <th scope="col">Area</th>
                              <th scope="col">Autor(es)</th>
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
                          <td><?=$dado['codExemplar'];?></td>
                          <td><?=$dado['titulo'];?></td>
                          <td><?=$dado['deposito'];?></td>
                          <td><?=$dado['anoPub'];?></td>
                          <td><?=$dado['isbn'];?></td>
                          <td><?=$dado['edicao'];?></td>
                          <td><?=$dado['medida'];?></td>
                          <td><?=$dado['categoria'];?></td>
                          <td><?=$dado['editora'];?></td>
                          <td><?=$dado['quantidade'];?></td>
                          <td><?=$dado['area'];?></td>
                          <td>
                           
                          <?php
                          $buscar = $read->ler_autores($dado['codExemplar']);
  
                          $i = 0;
                          foreach($buscar as $busca)
                          {
                              
                              if($i+1 == count($buscar))
                              {
                                  echo $busca['nome'];
                              }
                              else
                              {
                                  echo $busca['nome'].', ';
                              }
                              $i++;
                              
                          }
                          ?>
                          
                          </td>
                          <td class="col-action">
                          <a href="editar-exemplar.php?codExemplar=<?=$dado['codExemplar'];?>" class="btn-action">
                                            Editar
                                </a>    
                                <a href="exemplar.php?cod=<?=$dado['codExemplar'];?>" class="btn-action" >
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
                    <a href="cadastrar-exemplar.php">
                    <button type="button" class="btn-cadastrar">
                        cadastrar
                    </button>
                    </a>
                </section>
            </div>
        </main>
        <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript" src="script.js"></script>
    </body>
</html>
<?php      
    } else header('Location: login.php');
?>