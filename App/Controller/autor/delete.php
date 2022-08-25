<?php
//criação da namespace para inserir os fornecedores
namespace App\Controller\autor;
//inclusão do arquivo fornecedor da Model
use App\Model\autor;

//criação da classe inserir
class delete
{
//criação do método publico inserir_cliente
    public function remover()
    {
       
        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            if(isset($_GET["cod"])){
            $id = $_GET["cod"];
        
            $autor = new autor();
            
            // eliminar
            $autor->remover($id);
        
            header('Location: ../view/autor.php');
            }
           
        }
    }   
}