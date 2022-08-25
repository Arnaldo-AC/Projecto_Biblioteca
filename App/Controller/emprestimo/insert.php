<?php
namespace App\Controller\emprestimo;

use App\Model\emprestimo;
use App\Model\reserva;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


class insert
{
    private function buscar_livros($codigo)
    {
        $mod1 = new reserva();
            $exemplares = $mod1->buscar_exemplares($codigo);
            return $exemplares;
    }
    
    public function inserir()
    {
        $mod = new emprestimo();
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $emprestimos = [
            'dataEmprestimo'=> $_REQUEST['dataEmprestimo'],
            'idFuncionario'=> $_REQUEST['idFuncionario'],
            'estado'=> $_REQUEST['estado'],
            'idReserva'=> $_REQUEST['idReserva']
            ];
       
        
        // DIMINUIR O STOCK
        
        $livros = $this->buscar_livros($emprestimos['idReserva']);

        foreach($exemplares as $livros)
        {
            $mod->diminuirStock($livros['codExemplar']);
        }

        $mod->inserir($emprestimos);

        $mail = new PHPMailer();
        $cod = $mod->buscarEmailUsuario($emprestimos['idReserva']);
        $_SESSION['codigo'] = $cod;
        $mensagem = " <p> A tua solicitação de empréstimo foi validada para o dia ".$dataEmprestimo."</p> ";
        
        
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