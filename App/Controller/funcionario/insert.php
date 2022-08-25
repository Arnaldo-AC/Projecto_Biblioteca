<?php
//criação da namespace para inserir os funcionariose
namespace App\Controller\funcionario;
//inclusão do arquivo funcionario da Model
use App\Model\funcionario;

//criação da classe inserir
class insert
{
//criação do método publico inserir_funcionario
    public function inserir()
    {
    //instanciação da classe funcionario do arquivo funcionario da Model
        $mod = new funcionario();
    //verificacando se existe o método POST
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    //Se existir, então a variavel $funcionarioes vai guardar os dados recebidos
        $funcionarios = [
            'nome'=> $_REQUEST['nome'],
            'bi'=> $_REQUEST['bi'],
            'genero'=> $_REQUEST['genero'],
            'dataNasc'=> $_REQUEST['dataNasc'],
            'telefone'=> $_REQUEST['telefone'],
            'email'=> $_REQUEST['email'],
            'municipio'=> $_REQUEST['municipio'],
            'distrito'=> $_REQUEST['distrito'],
            'bairro'=> $_REQUEST['bairro'],
            'senha'=> $_REQUEST['senha'],
            'cargo'=> $_REQUEST['cargo'],
            'idNivel'=> $_REQUEST['idNivel']  
            ];
        //enviando os dados da variavel $funcionarioes para o método inserir da classe funcionario
        $mod->inserir($funcionarios);
	}
    
    }
  
}