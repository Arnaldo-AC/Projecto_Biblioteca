<?php
SESSION_START();
require_once '../../src/vendor/autoload.php';
use App\Controller\exemplar\update;
use App\Controller\exemplar\read;
if($_SESSION['loginStatus']){

    $alterar = new update();
    $alterar->alterar($_GET['codExemplar']);
    $read = new update();

    $ler = new read();
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
                
                <section class="section-pag-produto section-cad-cliente">
                    <header class="cabecalho-section">
                        <h1 class="titulo-section">edição <span class="dif-style">exemplar</span> </h1>
                    </header>
                    <form class="form-principal" method="post" action="" enctype="multipart/form-data">
                        <div class="subform">
                            <div class="box-input">
                            <?php
                          $buscar = $read->ler($_GET['codExemplar']);
                          foreach($buscar as $dado)
                          {
                        ?>
                                <input class="text-box" value="<?=$dado['titulo']?>" type="text" name="titulo" id=""/>
                                <label class="rotulo">Título do exemplar</label>
                            </div>
                            <div class="box-input">
                                <input class="text-box" value="<?=$dado['deposito']?>" type="text" name="deposito" id=""/>
                                <label class="rotulo">Deposito do exemplar</label>
                            </div>
                            <div class="box-input">
                                <input class="text-box" value="<?=$dado['anoPub']?>" type="text" name="anoPub" id=""/>
                                <label class="rotulo">Ano da publicação</label>
                            </div>
                            <div class="box-input">
                                <input class="text-box" value="<?=$dado['isbn']?>" type="text" name="isbn" id=""/>
                                <label class="rotulo">ISBN do exemplar</label>
                            </div>
                            <div class="box-input">
                                <input class="text-box" value="<?=$dado['localPub']?>" type="text" name="local" id=""/>
                                <label class="rotulo">local da publicação</label>
                            </div>
                            <div class="box-input">
                                <input class="text-box" value="<?=$dado['edicao']?>" type="text" name="edicao" id=""/>
                                <label class="rotulo">Edicao do exemplar</label>
                            </div>
                            <div class="box-input">
                                <input class="text-box" value="<?=$dado['medida']?>" type="text" name="medida" id=""/>
                                <label class="rotulo">Medida do exemplar</label>
                            </div>
                            
                            <div class="box-input">
                                <select name="idCategoria" id="">
                                <?php
                                    $categorias = $ler->buscarCategorias();
                                    foreach ($categorias as $categoria){   
                                ?> 
                                    <option value="<?=$categoria['codCategoria'];?>"><?=$categoria['descricao'];?></option>
                                <?php
                                    }
                                ?>
                                </select>
                                <label class="rotulo">Tipo do exemplar</label>
                            </div>
                            
                            <div class="box-input">
                                <select name="idEditora" id="">
                                <?php
                                    $editoras = $ler->buscarEditoras();
                                    foreach ($editoras as $editora){   
                                ?> 
                                    <option value="<?=$editora['codEditora'];?>"><?=$editora['nome'];?></option>
                                <?php
                                    }
                                ?>
                                </select>
                                <label class="rotulo">Editora do exemplar</label>
                            </div>
                            <div class="box-input">
                                <select name="area" id="">
                                <?php
                                    $areas = $ler->buscarAreas();
                                    foreach ($areas as $area){   
                                ?> 
                                    <option value="<?=$area['nome'];?>"><?=$area['nome'];?></option>
                                <?php
                                    }                      ?>
                                </select>
                                <label class="rotulo"> Área do exemplar</label>
                            </div>
                            <fieldset class="box-autor">
                                <legend>Autor(es)</legend>
                                <ul class="lista-autores">
                                <?php
                                    $autores = $ler->buscarAutores();
                                    foreach ($autores as $autor){   
                                ?> 
                                 <li>
                                        <input type="checkbox" name="autor[]" value="<?=$autor['codAutor'];?>"> <label for=""> <?=$autor['nome'];?></label>
                                    </li>
                                    <?php
                                    }
                                ?>
                                </ul>
                            </fieldset>
                        </div>
                        <div class="box-img-form">
                            <div class="box-img">
                                <img src="../../Public/Imagens/Exemplares/<?=$dado['foto']?>" id="image1">
                                <input type="file" name="foto" id="btn-add-file">
                            </div>
                            <p>Click no ícone acima para add uma img</p>
                        </div>
                        <?php
                    }
                    ?>
                        <button type="submit" class="btn-submit" class="btn-salvar">
                            <img src="./img/icon-save.png" alt="" class="img-save"/> <span> Salvar</span>
                        </button>
                        
                    </form>
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