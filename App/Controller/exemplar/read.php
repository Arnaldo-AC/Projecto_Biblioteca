<?php
//criação da namespace para visualizar os clientes
namespace App\Controller\exemplar;
//inclusão do arquivo cliente da Model
use App\Model\exemplar;
use App\Model\editora;
use App\Model\autor;


//criação da classe read
class read
{
//criação do método publico ler
    public function ler()
    {
        //instanciação da classe cliente do arquivo cliente da Model
        $mod = new exemplar();
        //acessando os atributos do método ver da classe cliente
            $exemplares = $mod->listar();
            //retorno das informações
            return $exemplares;
    }

    public function buscar6Ult($categoria)
    {
        //instanciação da classe cliente do arquivo cliente da Model
        $mod = new exemplar();
        //acessando os atributos do método ver da classe cliente
            $exemplares = $mod->buscar6Ult($categoria);
            //retorno das informações
            return $exemplares;
    }

    public function buscarTodos($categoria)
    {
        //instanciação da classe cliente do arquivo cliente da Model
        $mod = new exemplar();
        //acessando os atributos do método ver da classe cliente
            $exemplares = $mod->buscarTodos($categoria);
            //retorno das informações
            return $exemplares;
    }

    public function ler_autores($codigo)
    {
        //instanciação da classe cliente do arquivo cliente da Model
        $mod = new exemplar();
        //acessando os atributos do método ver da classe cliente
            $autores = $mod->listar_autores($codigo);
            //retorno das informações
            return $autores;
    }
    public function buscarCategorias()
    {
        $categoria = new exemplar();
        $categorias = $categoria->buscarCategorias();
        return $categorias;
    }
    public function buscarEditoras()
    {
        $editora = new editora();
        $editoras = $editora->listar();
        return $editoras;
    }

    public function buscarAutores()
    {
        $autor = new autor();
        $autores = $autor->listar();
        return $autores;
    }

    public function buscarAreas()
    {
        $area = new exemplar();
        $areas = $area->buscarAreas();
        return $areas;
    }

    public function buscarExemplares()
    {
        $produto = new exemplar();
        $argumentos = [
            'arg'=> $_REQUEST['arg']
        ];

        if(isset($_POST["arg"])){
           $table = $produto->pesquisar($argumentos);
           return $table; 
        }
    }
}