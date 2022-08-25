<?php
//criação da namespace para inserir os autors
namespace App\Controller\exemplar;
//inclusão do arquivo autor da Model
use App\Model\exemplar;

//criação da classe inserir
class update
{
//criação do método publico inserir_autor
    public function alterar($codigo)
    {
       
    //instanciação da classe autor do arquivo autor da Model
        $mod = new exemplar();
    //verificacando se existe o método POST
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    //Se existir, então a variavel $autors vai guardar os dados recebidos
    $exemplares = [
        'titulo'=> $_REQUEST['titulo'],
        'deposito'=> $_REQUEST['deposito'],
        'anoPub'=> $_REQUEST['anoPub'],
        'isbn'=> $_REQUEST['isbn'],
        'local'=> $_REQUEST['local'],
        'edicao'=> $_REQUEST['edicao'],
        'medida'=> $_REQUEST['medida'],
        'idCategoria'=> $_REQUEST['idCategoria'],
        'idEditora'=> $_REQUEST['idEditora'],
        'area'=> $_REQUEST['area']  
        ];
        //enviando os dados da variavel $autors para o método inserir da classe autor
        $mod->alterar($exemplares,$codigo);
        header('Location: ../view/exemplar.php');
	}
    
    }

    public function ler($id)
    {
        //instanciação da classe cliente do arquivo cliente da Model
        $mod = new exemplar();
        //acessando os atributos do método ver da classe cliente
            $exemplares = $mod->listarPorId($id);
            //retorno das informações
            return $exemplares;
    }
  
}
?>