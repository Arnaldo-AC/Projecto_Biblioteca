<?php
//criação da namespace para visualizar os clientes
namespace App\Controller\usuario;
//inclusão do arquivo cliente da Model
use App\Model\usuario;


//criação da classe read
class buscar
{
//criação do método publico ler
    public function ler()
    {
        //instanciação da classe cliente do arquivo cliente da Model
        $mod = new usuario();
        //acessando os atributos do método ver da classe cliente
            $usuarios = $mod->listar();
            //retorno das informações
            return $usuarios;
    }
}