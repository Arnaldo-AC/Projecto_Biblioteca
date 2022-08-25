<?php

$para = "acarnaldocatimba@gmail.com";
$assunto = "Teste simples de envio de email";
$corpo = "Olá eu sou";
$headers = "From:pancadatec2019@gmail.com";

if(mail($para, $assunto, $corpo, $headers))
{
    echo "email enviado com sucesso";
}
else
{
    echo "Falha no envio de email";
}
?>