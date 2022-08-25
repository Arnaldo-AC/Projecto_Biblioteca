<?php
SESSION_START();
require_once '../../src/vendor/autoload.php';
use App\Controller\reserva\read;
use App\Controller\reserva\insert;
use App\Controller\reserva\delete;
use App\Model\emprestimo;
use App\Model\exemplar;
if($_SESSION['loginStatus']){

$read = new read();

$inserir = new emprestimo();
if(isset($_POST['dataEmprestimo']) && isset($_POST['idFuncionario']) && isset($_POST['idReserva']) && isset($_POST['estado']))
{
    $emprestimos = [
        'dataEmprestimo'=> $_POST['dataEmprestimo'],
        'idReserva'=> $_POST['idReserva'],
        'idFuncionario'=> $_POST['idFuncionario'],
        'estado'=> $_POST['estado'],
        ];
    $inserir->inserir($emprestimos);
    $delete = new delete();
    $delete->remover();
}



$inserirEmp = new insert();
$inserirEmp->inserir();

$ler = $read->ler();
$dados = $read->buscarComp($_GET['codReserva']);
foreach($dados as $reserva)
{
    $dataEmp = date('d/m/Y H:i:s',strtotime($reserva['dataReserva']));
}

$categorias = $read->buscar_exemplares($_GET['codReserva']);
include_once 'header.php';
?>
            <nav>
                <ul class="lista-links">
                    <li class="link" onmousemove="mudarCor1(0)" onmouseout="mudarCor2(0)">
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
                    <li class="link pag_actual" onmousemove="mudarCor1(3)" onmouseout="mudarCor2(3)">
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
                        <h1 class="titulo-section">validar <span class="dif-style">empréstimo</span> </h1>
                    </header>
                    <form class="form-principal" method="POST" action="#">
                        <div class="subform">
                        <div class="box-input">
                                <input class="text-box" type="text" name="dataEmprestimo" value="<?=$dataEmp;?>"/>
                                <label class="rotulo">Data de Empréstimo do Usuário</label>
                            </div>
                            <div class="box-input">
                                <input class="text-box" type="datetime-local" name="dataEmprestimo" value="<?=$dataEmp;?>"/>
                                <label class="rotulo">Data de Empréstimo</label>
                            </div>
                            <div class="box-input">
                                <input class="text-box" type="hidden" name="idFuncionario" value="<?=$_SESSION['idFuncionario'];?>"/>
                               
                            </div>
                            <div class="box-input">
                                <input class="text-box" type="hidden" name="estado" value="em curso"/>
                            </div>
                            <div class="box-input">
                                <input class="text-box" type="hidden" name="idReserva" value="<?=$_GET['codReserva']?>"/>
                            </div>
                           
                        </div>
                        <div class="box-img-form">
                                <a href="upload.php?idReserva=<?=$_GET['codReserva']?>">abrir ficheiro</a>
                        </div>
                        <button type="submit" class="btn-submit" class="btn-salvar">
                            <img src="./img/icon-save.png" alt="" class="img-save"/> <span> Salvar</span>
                        </button>
                    </form>
                       
                </section>
                <div class="container-tabela">
                    <table class="table table-hover table-responsive-md">
                        <thead>
                            <tr>
                              <th class="col-id" scope="col">#</th>
                              <th scope="col">Título</th>
                              <th scope="col">Ano de publicação</th>
                              <th scope="col">Edição</th>
                              <th scope="col">Categoria</th>
                              <th scope="col">Editora</th>
                              <th scope="col">Autor(es)</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                        foreach($categorias as $dado)
                        {
                        ?>
                        <tr>
                          <td><?=$dado['codExemplar'];?></td>
                          <td><?=$dado['titulo'];?></td>
                          <td><?=$dado['anoPub'];?></td>
                          <td><?=$dado['edicao'];?></td>
                          <td><?=$dado['categoria'];?></td>
                          <td><?=$dado['editora'];?></td>
                          <td>  
                         #
                          </td>
                            </tr>
                            <?php
                              }
                              ?>
                        </tbody>
                      </table>
                    </div>
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