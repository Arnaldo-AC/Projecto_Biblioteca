<?php
//criação da namespace para visualizar os clientes
namespace App\Controller\autor;
//inclusão do arquivo cliente da Model
use App\Model\autor;

//criação da classe read
class read
{
//criação do método publico ler
    public function ler()
    {
        //instanciação da classe cliente do arquivo cliente da Model
        $mod = new autor();
        //acessando os atributos do método ver da classe cliente
            $autores = $mod->listar();
            //retorno das informações
            return $autores;
    }

    public function lerPorId($codigo)
    {
        //instanciação da classe cliente do arquivo cliente da Model
        
        $mod = new autor();
        //acessando os atributos do método ver da classe cliente
            $autores = $mod->buscarAutores($codigo);
            //retorno das informações
            return $autores;
    }
   
}