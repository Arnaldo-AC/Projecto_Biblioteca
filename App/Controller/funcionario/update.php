<?php
//criação da namespace para inserir os autors
namespace App\Controller\funcionario;
//inclusão do arquivo autor da Model
use App\Model\funcionario;

//criação da classe inserir
class update
{
//criação do método publico inserir_autor
    public function alterar($codigo)
    {
       
    //instanciação da classe autor do arquivo autor da Model
        $mod = new funcionario();
    //verificacando se existe o método POST
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    //Se existir, então a variavel $autors vai guardar os dados recebidos
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
        'numfuncionario'=> $_REQUEST['numfuncionario'],
        'idNivel'=> $_REQUEST['idNivel']  
        ];
        //enviando os dados da variavel $autors para o método inserir da classe autor
        $mod->alterar($funcionarios,$codigo);
        header('Location: ../view/funcionario.php');
	}
    
    }

    public function ler($id)
    {
        //instanciação da classe cliente do arquivo cliente da Model
        $mod = new funcionario();
        //acessando os atributos do método ver da classe cliente
            $funcionarios = $mod->listarPorId($id);
            //retorno das informações
            return $funcionarios;
    }
  
}
?>