<?php
SESSION_START();

require_once '../../src/vendor/autoload.php';
//inclusão do arquivo cliente da Model
use App\Model\relatorio;

if($_SESSION['loginStatus']){

$contador = new relatorio();
$cont1 = $contador->buscarUsuario('Professor');
$cont2 = $contador->buscarUsuario('Aluno');
$cont3 = $contador->buscarExemplar();
$cont4 = $contador->buscarEmprestimo();
$pizza1 = $contador->buscarExemplares('Livro');
$pizza2 = $contador->buscarExemplares('Artigo');
$pizza3 = $contador->buscarExemplares('Revista');

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
            </div>
            <!-- Aqui termina o meu lateral-->          
            <!-- Aqui inicia a area de apresentacao-->
            <div class="area-apresentacao ap-produtos">
                <section class="section-card">
                <header>
                        <div class="cabecalho-section"> 
                            <h1 class="titulo-section">Dados <span class="dif-style">Estatísticos</span></h1>
                        </div>
                    </header>
                    <div class="box-cards">
                        <div class="box-card">
                            <div class="left-side">
                                <div class="desc-card">
                                    Número de Estudantes
                                </div>
                                <div class="num-card">
                                <?=$cont2?>
                                </div>
                            </div>
                            <div class="right-side">
                                <img src="img/icon-student.png" alt="">
                            </div>
                        </div>
                        <div class="box-card">
                            <div class="left-side">
                                <div class="desc-card">
                                    Número de Professores
                                </div>
                                <div class="num-card">
                                    <?=$cont1?>
                                </div>
                            </div>
                            <div class="right-side">
                                <img src="img/icon-teacher.png" alt="">
                            </div>
                        </div>
                        <div class="box-card">
                            <div class="left-side">
                                <div class="desc-card">
                                    Número de Exemplares
                                </div>
                                <div class="num-card">
                                <?=$cont3?>
                                </div>
                            </div>
                            <div class="right-side">
                                <img src="img/icon-book.png" alt="">
                            </div>
                        </div>
                        <div class="box-card">
                            <div class="left-side">
                                <div class="desc-card">
                                    Número de Empréstimos
                                </div>
                                <div class="num-card">
                                <?=$cont4?>
                                </div>
                            </div>
                            <div class="right-side">
                                <img src="img/icon-sell.png" alt="">
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section-grafic">
                    <div class="box-grafic-1">
                        <div id="curve_chart" style="width: 620px; height: 400px"></div>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            ['Mes', 'Emprestimos', 'Devoluções'],
                            ['Janeiro',  1000, 500],
                            ['Fevereiro',  1170, 700],
                            ['Março',  660, 400],
                            ['Abril',  1030, 1000],
                            ['Maio',  1000, 1000],
                            ['Junho',  1170,1050],
                            ['Julho',  660,670],
                            ['Agosto',  1030,1000],
                            ['Setembro',  1000,950],
                            ['Outubro',  1170,1170],
                            ['Novembro',  660,655],
                            ['Dezembro',  1030,1028]
                            ]);

                            var options = {
                            title: 'Controle de empréstimo',
                            curveType: 'function',
                            legend: { position: 'bottom' }
                            };

                            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                            chart.draw(data, options);
                        }
                        </script>
                    </div>
                    <div class="box-grafic-2">
                    <div id="piechart" style="width: 620px; height: 400px;"></div>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {

                            var data = google.visualization.arrayToDataTable([
                            ['Task', 'Hours per Day'],
                            ['Livro',     <?=$pizza1?>],
                            ['Artigo',      <?=$pizza2?>],
                            ['Revista',  <?=$pizza3?>]
                            ]);

                            var options = {
                            title: 'Exemplares cadastrados'
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                            chart.draw(data, options);
                        }
                        </script>
                    </div>
                </section>
            </div>
        </main>
        <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript" src="script.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>

    </body>
</html>
<?php      
    } else header('Location: login.php');
?>