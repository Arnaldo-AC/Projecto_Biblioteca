<?php
SESSION_START();

require_once '../../src/vendor/autoload.php';
use App\Controller\usuario\read;
try{
    if($_SESSION['loginStatus']){

        $read = new read();
}
catch(Exception $erro)
{
    
}
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
                    <li class="link pag_atual">
                        <a href="usuario.php">
                        <div class="dentro">
                            <div class="icon">
                                <img class="icon-menu" src="./img/image-s5.png" alt="icone-produto">
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
                        <h1 class="titulo-section">cadastro <span class="dif-style">usuário</span> </h1>
                    </header>
                    <form class="form-principal" action="usuario.php" method="post" enctype="multipart/form-data">
                            <div class="subform">
                                <div class="box-input">
                                    <input class="text-box" type="text" name="nome" id=""/>
                                    <label class="rotulo">Nome do usuário</label>
                                </div>
                                <div class="box-input">
                                    <input class="text-box" type="text" name="bi" id=""/>
                                    <label class="rotulo">BI do usuário</label>
                                </div>
                                <div class="box-input">
                                    <select name="genero" id="">
                                        <option value="M">Masculino</option>
                                        <option value="F">Feminino</option>
                                    </select>
                                    <label class="rotulo">Genero do usuário</label>
                                </div>
                                <div class="box-input">
                                    <input class="text-box" type="date" name="dataNasc" id=""/>
                                    <label class="rotulo">Data de nascimento</label>
                                </div>
                                <div class="box-input">
                                    <input class="text-box" type="text" name="telefone" id=""/>
                                    <label class="rotulo">Telefone do usuário</label>
                                </div>
                                <div class="box-input">
                                    <input class="text-box" type="text" name="email" id=""/>
                                    <label class="rotulo">E-mail do usuário</label>
                                </div>
                                <div class="box-input">
                                    <input class="text-box" type="text" name="municipio" id=""/>
                                    <label class="rotulo">Municipio do usuário</label>
                                </div>
                                <div class="box-input">
                                    <input class="text-box" type="text" name="distrito" id=""/>
                                    <label class="rotulo">Distrito do usuário</label>
                                </div>
                                <div class="box-input">
                                    <input class="text-box" type="text" name="bairro" id=""/>
                                    <label class="rotulo">Bairro do usuário</label>
                                </div>
                                <div class="box-input">
                                    <input class="text-box" type="password" name="senha" id=""/>
                                    <label class="rotulo">Senha do usuário</label>
                                </div>
                                <div class="box-input">
                                    <input class="text-box" type="text" name="numUsuario" id=""/>
                                    <label class="rotulo">Número do usuário</label>
                                </div>
                                <div class="box-input">
                                    <input class="text-box" type="text" name="curso" id=""/>
                                    <label class="rotulo">Curso do usuário</label>
                                </div>
                                <div class="box-input">
                                    <select name="idNivel" id="">
                                <?php
                                    $niveis = $read->buscarNivel();
                                    foreach($niveis as $nivel){   
                                ?> 
                                    <option value="<?=$nivel['codNivel'];?>"><?=$nivel['descricao'];?></option>
                                <?php
                                    }
                                ?>
                                    </select>
                                    <label class="rotulo">Nível do usuário</label>
                                </div>
                            </div>
                            <div class="box-img-form">
                                <div class="box-img">
                                    <img src="img/picture2.png" alt="" id="image1">
                                    <input class="text-box" type="file" name="foto" id="btn-add-file">
                                </div>
                                <p>Click no ícone acima para add uma img</p>
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
        <script type="text/javascript" src="script.js"></script>
    </body>
</html>
<?php      
    } else header('Location: login.php');
?>