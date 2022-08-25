<?php
//criação da namespace para alterar os clientes
namespace App\Controllers\cliente;
//inclusão do arquivo cliente da Model
use App\Models\cliente;

//criação da classe update
class update{
    //criação do método update
    function update()
    {
        //instanciação da classe cliente do arquivo cliente da Model
        $mod=new cliente;
        //verificando se existe o método POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
         {
//Se existir, então a variavel $servicos vai guardar as alterações feitas    
            $clientes = [ 
                'bi'=> $_REQUEST['bi'],
                'nome'=> $_REQUEST['nome'],
                'dateNasc'=> $_REQUEST['dataNasc'],
                'genero'=> $_REQUEST['genero'],
                'email'=> $_REQUEST['email'],
                'nacionalidade'=> $_REQUEST['nacionalidade'],
                'competencia'=> $_REQUEST['competencia'],
                'id_indereco'=> $_REQUEST['id_indereco']
           
            ];     
//enviando as alterações da variavel $clientes para o método inserir da classe cliente       
            $mod->update($clientes);
        } 
    }
}
?>