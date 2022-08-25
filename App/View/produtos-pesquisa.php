<?php
SESSION_START();

require_once '../../src/vendor/autoload.php';
use App\Controller\exemplar\read;

try
{
    $table = [];

$read = new read();
if(isset($_POST['arg'])){
    $table = $read->buscarExemplares();
    }
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
} else{
    require_once "headerSimples.php";
}    
?>
    <main>
        <section class="section-produto">
            <h1 class="titulo1-pesq container">
            <?php
                    if(($_POST['arg'] != '') && (count($table)>0)){
                ?>
                    <img src="img/icon-lupa-ouro-28.png" alt=""> resultado(os) para '<span class="keyword"><?=$_POST['arg']?></span>' 
                <?php
                    } else{
                ?>
                <img src="img/icon-lupa-cinza-28.png" alt=""> sem correspondência para '<span class="keyword"><?=$_POST['arg']?></span>'
                <?php
                    }
                ?>
            </h1>
            <div class="box-produtos container">
            <?php
                    if (($_POST['arg'] != '') && (count($table)>0)) {
                    foreach ($table as $linha) {
                 
                ?>
                    <div class="box-produto">
                        <div class="box-img-produto">
                            <img src="../../public/imagens/exemplares/<?=$linha['foto'];?>" alt="" class="img-produto">
                        </div>
                        <div class="box-nome-produto">
                            <?=$linha['titulo'];?>
                            <div class="box-ori-prod">
                            <span class="origem">Edição:</span> <?=$linha['edicao'];?>
                            </div>
                        </div>
                        <div class="box-desc-prod">
                            <form action="#" method="post">
                               <input type="hidden" name="id_produto" value="<?=$linha['id']?>">
                               <?php
                                    if (isset($_SESSION['id'])) {
                               ?>
                               <input type="hidden" name="id_cliente" value="<?=$_SESSION['id']?>"> 
                               <?php
                                    }
                               ?>        
                                <div>
                                    <?php
                                        if(isset($_SESSION['loginStatusUsuario'])){
                                    ?>
                                        <button type="submit" class="btn-add-car">
                                            Add no carrinho
                                        </button>
                                    <?php
                                        } else{

                                    ?>
                                        <button type="button" class="btn-add-car" disabled>
                                            Add no carrinho
                                        </button>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </form>
                            
                        </div>
                    </div>
                    <?php
                
                    }
                }
                ?>    
            </div>
        </section>
    </main>
    <?php
    require_once "footer.php";
    ?>  
</body>
</html>