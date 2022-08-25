<?php
//criação da namespace para inserir os fornecedores
namespace App\Controller\editora;
//inclusão do arquivo fornecedor da Model
use App\Model\editora;

//criação da classe inserir
class delete
{
//criação do método publico inserir_cliente
    public function remover()
    {
       
        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            if(isset($_GET["id"])){
            $id = $_GET["id"];
        
            $editora = new editora();
            
            $editora->remover($id);

            header('Location: ../view/clientes.php');
            }
           
        }
    }   
}