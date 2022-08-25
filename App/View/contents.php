<?php
SESSION_START();

require_once '../../src/vendor/autoload.php';
?>
<h2>Este é o seu código de recuperação de senha <?=$_SESSION['codigo'];?></h2>