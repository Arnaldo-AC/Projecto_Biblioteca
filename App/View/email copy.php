<?php

$para = "senisotnas@outlook.com";
$headers = "MIME-Version: 1.1\r\n";
$headers .= "content-type: text/html; charset=utf8_general_ci\r\n";
$headers .= "From: Inês <mirciagarcia@outlook.com>\r\n";

$mensagem = "oi gente";

$assunto = "Teste simples de envio de email";

if(mail($para, $assunto, $mensagem, $headers))
{
    echo "email enviado com sucesso";
}
else
{
    echo "Falha no envio de email";
}
?>