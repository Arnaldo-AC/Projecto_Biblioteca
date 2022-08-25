<?php
SESSION_START();
require_once '../../src/vendor/autoload.php';
use App\Controller\usuario\insert;
use App\Controller\usuario\read;
use App\Controller\usuario\delete;


$read = new read();

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/grid.css"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <title>Seja Bem-vindo!</title>
</head>
<body> 
<?php
if(isset($_SESSION['loginStatusUsuario'])) {
    require_once "headerLogado.php";    
} else{
    require_once "headerSimples.php";
}    
?>
    <main>
            <h1 class="titulo1-dif">
                 confira abaixo a Sua biblioteca
            </h1>
            <div class="box-tabela container" style="margin-bottom:40px;">
                <table class="table table-hover table-responsive-md">
                    <caption>
                        TODOS OS EXEMPLARES QUE ESTÁ LENDO
                    </caption>
                    <thead>
                      <tr>
                      <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Edição</th>
                        <th scope="col">Data de empréstimo</th>
                        <th scope="col">Data de devolucao</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                          $result = $read->buscarLeituras($_SESSION['idUsuario'],'em curso');
                          $i = 0;
                        foreach($result as $dado)
                        {
                            $i++;
                        ?>
                        <tr>
                        <td><?=$i;?></td>
                          <td><?=$dado['titulo'];?></td>
                          <td><?=$dado['categoria'];?></td>
                          <td><?=$dado['edicao'];?></td>
                          <td><?=$dado['dataEmprestimo'];?></td>
                          <td><?=$dado['dataDevolucao'];?></td>
                            </tr>
                            <?php
                              }
                              ?>
                        </tbody>
                  </table>
            </div>
            <div class="box-tabela container" style="margin-bottom:40px;">
                <table class="table table-hover table-responsive-md">
                    <caption>
                        TODOS OS EXEMPLARES JÁ RESERVADOS
                    </caption>
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Edição</th>
                        <th scope="col">Data de empréstimo</th>
                        <th scope="col">Data de devolucao</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                          $result = $read->buscarLeituras($_SESSION['idUsuario'],'devolvido');
                          $i = 0;
                        foreach($result as $dado)
                        {
                            $i++;
                        ?>
                        <tr>
                        <td><?=$i;?></td>
                          <td><?=$dado['titulo'];?></td>
                          <td><?=$dado['categoria'];?></td>
                          <td><?=$dado['edicao'];?></td>
                          <td><?=$dado['dataEmprestimo'];?></td>
                          <td><?=$dado['dataDevolucao'];?></td>
                            </tr>
                            <?php
                              }
                              ?>
                    </tbody>
                  </table>
            </div>
    </main>
    <?php
    require_once "footer.php";
    ?>    
     <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
</body>
</html>