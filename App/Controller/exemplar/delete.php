<?php
//criação da namespace para inserir os fornecedores
namespace App\Controller\exemplar;
//inclusão do arquivo fornecedor da Model
use App\Model\exemplar;

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
        
            $exemplar = new exemplar();
            
            $exemplar->remover($id);

            header('Location: ../view/clientes.php');
            }
           
        }
    }   
}