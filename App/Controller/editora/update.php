<?php
//criação da namespace para inserir os autors
namespace App\Controller\editora;
//inclusão do arquivo autor da Model
use App\Model\editora;

//criação da classe inserir
class update
{
//criação do método publico inserir_autor
    public function alterar($codigo)
    {
       
    //instanciação da classe autor do arquivo autor da Model
        $mod = new editora();
    //verificacando se existe o método POST
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    //Se existir, então a variavel $autors vai guardar os dados recebidos
    $editoras = [
        'nome'=> $_REQUEST['nome'],
        'pais'=> $_REQUEST['pais'],
        'cidade'=> $_REQUEST['cidade'],
        'email'=> $_REQUEST['email'],
        'telefone'=> $_REQUEST['telefone']  
        ];
        //enviando os dados da variavel $autors para o método inserir da classe autor
        $mod->alterar($editoras,$codigo);
        header('Location: ../view/editora.php');
	}
    
    }

    public function ler($id)
    {
        //instanciação da classe cliente do arquivo cliente da Model
        $mod = new editora();
        //acessando os atributos do método ver da classe cliente
            $editoras = $mod->listarPorId($id);
            //retorno das informações
            return $editoras;
    }
  
}
?>