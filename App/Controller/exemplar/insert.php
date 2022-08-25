<?php
//criação da namespace para inserir os exemplarse
namespace App\Controller\exemplar;
//inclusão do arquivo exemplar da Model
use App\Model\exemplar;

//criação da classe inserir
class insert
{
//criação do método publico inserir_exemplar
    public function inserir()
    {
       
    //instanciação da classe exemplar do arquivo exemplar da Model
        $mod = new exemplar();
    //verificacando se existe o método POST
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    //Se existir, então a variavel $exemplares vai guardar os dados recebidos
    if(isset($_REQUEST['autor']) && isset($_FILES['foto']))
    {
        //echo "Olá";
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
        //enviando os dados da variavel $exemplares para o método inserir da classe exemplar
        $mod->inserir($exemplares);

        $autor = $_REQUEST['autor'];
        for($i=0; $i < count($autor); $i++)
        {
            $mod->inserir_autores($autor[$i]);
        } 
    }
        
	}
    
    }
  
}