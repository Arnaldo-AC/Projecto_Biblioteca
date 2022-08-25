<?php
//criação da namespace para inserir os editoras
namespace App\Controller\editora;
//inclusão do arquivo editora da Model
use App\Model\editora;

//criação da classe inserir
class insert
{
//criação do método publico inserir_editora
    public function inserir()
    {
       
    //instanciação da classe editora do arquivo editora da Model
        $mod = new editora();
    //verificacando se existe o método POST
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    //Se existir, então a variavel $editoras vai guardar os dados recebidos
        $editoras = [
            'nome'=> $_REQUEST['nome'],
            'pais'=> $_REQUEST['pais'],
            'cidade'=> $_REQUEST['cidade'],
            'email'=> $_REQUEST['email'],
            'telefone'=> $_REQUEST['telefone']  
            ];
        //enviando os dados da variavel $editoras para o método inserir da classe editora
        $mod->inserir($editoras);
	}
    
    }
  
}