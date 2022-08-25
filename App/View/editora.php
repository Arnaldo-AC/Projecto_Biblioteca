<?php
SESSION_START();

require_once '../../src/vendor/autoload.php';
use App\Controller\editora\insert;
use App\Controller\editora\read;
use App\Controller\editora\delete;
if($_SESSION['loginStatus']){
$remover = new delete();
$remover->remover();

$inserir = new insert();
$inserir->inserir();

$read = new read();
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
                    <li class="link pag_atual">
                        <a href="editora.php">
                        <div class="dentro">
                            <div class="icon">
                                <img class="icon-menu" src="./img/image-s2.png" alt="icone-produto">
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
                        <h1 class="titulo-section">visualizar <span class="dif-style">Editora(s)</span></h1>
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
                            <th scope="col">Nome</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Telefone</th>
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
                            <td><?=$dado['codEditora'];?></td>
                            <td><?=$dado['nome'];?></td>
                            <td><?=$dado['endereco'];?></td>
                            <td><?=$dado['email'];?></td>
                            <td><?=$dado['telefone'];?></td>
                            <td class="col-action">
                            <a href="editar-editora.php?codEditora=<?=$dado['codEditora'];?>" class="btn-action">
                                            Editar
                                </a>    
                                <a href="editora.php?cod=<?=$dado['codEditora'];?>" class="btn-action" >
                                            Eliminar
                                </a>
                                </td>
                              </tr>
                              <?php
                        }?>
                        </tbody>
                      </table>
                    </div>
                    <a href="cadastrar-editora.php">
                    <button type="button" class="btn-cadastrar">
                        cadastrar
                    </button>
                    </a>
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