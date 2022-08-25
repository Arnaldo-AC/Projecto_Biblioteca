<?php
//criação do namespace para deletar cliente
namespace App\Controller\reserva;
//incluindo o arquivo cliente que está na Model
use App\Model\reserva;

//criação da classe delete
class delete{
//criação do método delete
public function remover()
{
   
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST["idReserva"])){
        $id = $_POST["idReserva"];
    
        $funcionario = new reserva();
        
        $funcionario->remover($id);

        header('Location: ../view/reserva.php');
        }
       
    }
}   
}
?>