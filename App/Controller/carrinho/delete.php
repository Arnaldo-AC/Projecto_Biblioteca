<?php
//criação da namespace para inserir os fornecedores
namespace App\Controller\carrinho;
//inclusão do arquivo fornecedor da Model
use App\Model\carrinho;

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
        
            $carrinho = new carrinho();
            
            $carrinho->remover($id);
        
            header('Location: ../view/carrinho.php');
            }
           
        }
        else
            if($_SERVER['REQUEST_METHOD'] == 'POST')
        {

            $id = $_POST['idUsuario'];
            $carrinho = new carrinho();
            
            $carrinho->remover($id);
        
            header('Location: ../view/carrinho.php');

        }
    }   
}