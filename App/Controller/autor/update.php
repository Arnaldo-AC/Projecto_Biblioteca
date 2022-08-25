<?php
//criação da namespace para inserir os autors
namespace App\Controller\autor;
//inclusão do arquivo autor da Model
use App\Model\autor;

//criação da classe inserir
class update
{
//criação do método publico inserir_autor
    public function alterar($codigo)
    {
       
    //instanciação da classe autor do arquivo autor da Model
        $mod = new autor();
    //verificacando se existe o método POST
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    //Se existir, então a variavel $autors vai guardar os dados recebidos
        $autores = [
            'nome'=> $_REQUEST['nome'],
            'nacionalidade'=> $_REQUEST['nacionalidade'],
            'area'=> $_REQUEST['area'],
            'cargo'=> $_REQUEST['cargo'],
            'genero'=> $_REQUEST['genero'],
            'dataNasc'=> $_REQUEST['dataNasc']   
            ];
        //enviando os dados da variavel $autors para o método inserir da classe autor
        $mod->alterar($autores,$codigo);
        header('Location: ../view/autor.php');
	}
    
    }

    public function ler($id)
    {
        //instanciação da classe cliente do arquivo cliente da Model
        $mod = new autor();
        //acessando os atributos do método ver da classe cliente
            $autores = $mod->listarPorId($id);
            //retorno das informações
            return $autores;
    }
  
}
?>