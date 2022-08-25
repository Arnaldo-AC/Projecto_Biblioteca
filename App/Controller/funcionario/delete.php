<?php
//criação do namespace para deletar cliente
namespace App\Controller\funcionario;
//incluindo o arquivo cliente que está na Model
use App\Model\funcionario;

//criação da classe delete
class delete
{
//criação do método publico inserir_cliente
    public function remover()
    {
       
        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            if(isset($_GET["id"])){
            $id = $_GET["id"];
        
            $funcionario = new funcionario();
            
            $funcionario->remover($id);

            header('Location: ../view/funcionarios.php');
            }
           
        }
    }   
}
?>