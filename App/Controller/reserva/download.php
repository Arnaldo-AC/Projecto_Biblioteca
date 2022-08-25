<?php

namespace App\Controller\reserva;

use App\Model\reserva;

class download
{
    public function baixar()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_REQUEST['codReserva']))
        {
            $mod = new reserva();
            $reservas = $mod->listar();
            $reserva = [
                'codReserva'=> $_REQUEST['codReserva']
            ];
            foreach ($reservas as $reservar) {
                if($reservar['codReserva']==$reserva['codReserva'])
                {
                    $nome = $reservar['comprovativo'];
                 //   $t = $nome.length();
               //     $tipo = substr($nome,$t-4);
               $tipo = 'pdf';
                    $file = "../../../Public/Imagens/reservas/$nome";
                 /*   header("content-disposition: attachment; filename={$nome}");
                    header("content-type: aplication/{$tipo}");*/

                /*    header("Content-Type: aplication/".$tipo);
                    // informa o tipo do arquivo ao navegador
                    header("Content-Length: ".filesize($file));
                    // informa o tamanho do arquivo ao navegador
                    header("Content-Disposition: attachment; filename=".basename($file));
                    // informa ao navegador que é tipo anexo e faz abrir a janela de download,
                    //tambem informa o nome do arquivo
                    readfile($file); // lê o arquivo
                    exit; // aborta pós-ações*/


                    header("Content-Type: application/pdf");
                    header("Content-Length: ".filesize($nome));
                    header("Content-Disposition: attachment; filename=".basename($nome));
                    readfile($file);
                    exit(); 
    
              //  readfile($file);
                } 
        }
       
    }
   
    }
  
}