<?php
SESSION_START();

require_once '../../src/vendor/autoload.php';
use App\Controller\carrinho\read;
use App\Controller\carrinho\delete;
use App\Controller\reserva\insert;

try
{
$deleteCarrinho = new delete();
$deleteCarrinho->remover();

$readCarrinho = new read();

$inserirReserva = new insert();
$inserirReserva->inserir();
}
catch(Exception $erro)
{
    
}
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
}    
?>
    <main>
            <h1 class="titulo1-dif">
                 Confira abaixo os seus exemplares
            </h1>
            <div class="box-tabela container tabela-carrinho" >
                <table class="table table-hover table-responsive-md">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Edição</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Acções</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      if(isset($_SESSION['idUsuario'])){
                        $carrinho = $readCarrinho->buscar($_SESSION['idUsuario']);
                      
                      foreach($carrinho as $exemplar)
                      {
                      ?>
                      <tr>
                      <form action="" method="post" enctype="multipart/form-data">
                        <td>
                            <input type="hidden" name="exemplar[]" value="<?=$exemplar['codExemplar'];?>">
                            <?=$exemplar['codExemplar'];?>
                        </td>
                        <th scope="row">
                            <?=$exemplar['titulo']?>
                        </th>
                        <td>
                            <?=$exemplar['edicao'];?>
                        </td>
                        <td>
                            <?=$exemplar['categoria'];?>
                        </td>
                        <td class="col-action">
                            <a href="carrinho.php?id_exemplar=<?=$exemplar['codExemplar'];?>" class="btn-action">
                                Eliminar
                            </a>
                        </td>
                        </tr>
                    <?php
                    }
                }
                    ?>  
                    </tbody>
                  </table>
            </div>
            <div class="box-preco-final">
                <span class="texto-preco-final">Caução:</span> <span class="num-preco-final">2.000,00</span><span class="moeda">Kz</span>
                <div>
                    <input type="hidden" name="total">
                </div>
            </div>
            <div class="box-btn-conf-car">
                
                <input type="file" name="comprovativo" style="margin-right:8px;">
                
                <div class="box-input-entrega">
                    <label class="rotulo-input">Data de recepção</label>
                    <input type="datetime-local" name="dataReserva" id="" class="input-data-entrega"/>
                </div>
                <input type="hidden" name="idUsuario" value="<?=$_SESSION['idUsuario'];?>">
                <button type="submit" class="btn-conf-car">
                    Solicitar
                </button>
                </form>
            </div>
            
    </main>
    <?php
    require_once "footer.php";
    ?>    
     <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
    <script>
        
    </script>
</body>
</html>