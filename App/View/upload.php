<?php
SESSION_START();
require_once '../../src/vendor/autoload.php';
use App\Controller\reserva\read;
if($_SESSION['loginStatus']){

    $read = new read();

    $reservas = $read->buscarComp($_GET['idReserva']);
    foreach($reservas as $reserva)
    $cmp = $reserva['comprovativo'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprovativo</title>
</head>
<body>
    <div style="height:700px; width: 100%;">
    <embed src="../../Public/Imagens/Reservas/<?=$cmp?>" type="application/pdf" width="100%" height="100%">
    </div>
</body>
</html>
<?php
}
?>