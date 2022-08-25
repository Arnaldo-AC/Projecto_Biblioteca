<?php
//criação da namespace para visualizar os clientes
namespace App\Controller\editora;
//inclusão do arquivo cliente da Model
use App\Model\editora;

//criação da classe read
class read
{
//criação do método publico ler
    public function ler()
    {
        //instanciação da classe cliente do arquivo cliente da Model
        $mod = new editora();
        //acessando os atributos do método ver da classe cliente
            $editoras = $mod->listar();
            //retorno das informações
            return $editoras;
    }
   
}