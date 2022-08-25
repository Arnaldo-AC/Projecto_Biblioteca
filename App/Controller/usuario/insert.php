<?php

namespace App\Controller\usuario;  

require_once '../../src/vendor/autoload.php';
//criação da namespace para inserir os usuariose

//inclusão do arquivo usuario da Model
use App\Model\usuario;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;



//criação da classe inserir
class insert
{
//criação do método publico inserir_usuario
    public function inserir()
    {
    //instanciação da classe usuario do arquivo usuario da Model
        $mod = new usuario();
    //verificacando se existe o método POST
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    //Se existir, então a variavel $usuarioes vai guardar os dados recebidos
        $usuarios = [
            'nome'=> $_REQUEST['nome'],
            'bi'=> $_REQUEST['bi'],
            'genero'=> $_REQUEST['genero'],
            'dataNasc'=> $_REQUEST['dataNasc'],
            'telefone'=> $_REQUEST['telefone'],
            'email'=> $_REQUEST['email'],
            'municipio'=> $_REQUEST['municipio'],
            'distrito'=> $_REQUEST['distrito'],
            'bairro'=> $_REQUEST['bairro'],
            'senha'=> $_REQUEST['senha'],
            'numUsuario'=> $_REQUEST['numUsuario'],
            'curso'=> $_REQUEST['curso'],
            'idNivel'=> $_REQUEST['idNivel']  
            ];
        //enviando os dados da variavel $usuarioes para o método inserir da classe usuario
        $mod->inserir($usuarios);
	}
}
    public function inserir_codigo()
    {
    //instanciação da classe usuario do arquivo usuario da Model
        $mod = new usuario();
    //verificacando se existe o método POST
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    //Se existir, então a variavel $usuarioes vai guardar os dados recebidos
        $usuarios = [
            'email'=> $_REQUEST['email'] 
            ];
        //enviando os dados da variavel $usuarioes para o método inserir da classe usuario
      
      
        $mod->inserir_codigo($usuarios);
        $cod = $mod->buscarCodigo($usuarios['email']);

            if($cod != null)
            {
                $mail = new PHPMailer();
        
                $_SESSION['codigo'] = $cod;
                $mensagem = " <p> Este é o seu código de recuperação de senha " .$cod."</p> ";
                
                
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Debugoutput = 'html';
                $mail->Host = 'smtp-mail.outlook.com';
                $mail->Port = 587; //587
                $mail->SMTPSecure = 'STARTTLS'; //tls
                $mail->SMTPAuth = true;
                $mail->Username = 'mirciagarcia@outlook.com';
                $mail->Password = 'Mircia123';
                $mail->setFrom('mirciagarcia@outlook.com','MUKANDA');
                $mail->addAddress($usuarios['email']);
                $mail->Subject = 'Codigo de recuperacao de senha';
                //$mail->msg($cod);
              //  $mail->msgHTML(file_get_contents('contents.php'), __DIR__);
                $mail->Body = $mensagem;
                $mail->AltBody = 'Recupere a senha';
                
                if(!$mail->send())
                {
                    echo 'Erro '.$mail->ErrorInfo;
                }
                else
                {
                   echo 'Email enviado';
                  header("Location:nova_senha.php?email=".$usuarios['email'].""); 
                
                }
            }
     

	}
    
    }
  
}