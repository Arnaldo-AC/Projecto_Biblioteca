<?php
//criação da namespace para visualizar os clientes
namespace App\Controller\reserva;
//inclusão do arquivo cliente da Model
use App\Model\exemplar;
use App\Model\editora;
use App\Model\reserva;


//criação da classe read
class read
{
//criação do método publico ler
    public function ler()
    {
        //instanciação da classe cliente do arquivo cliente da Model
        $mod = new reserva();
        //acessando os atributos do método ver da classe cliente
            $reservas = $mod->listar();
            //retorno das informações
            return $reservas;
    }
    public function ler_exemplares($codigo)
    {
        //instanciação da classe cliente do arquivo cliente da Model
        $mod = new exemplar();
        //acessando os atributos do método ver da classe cliente
            $exemplares = $mod->listar_exemplares($codigo);
            //retorno das informações
            return $exemplares;
    }
    public function buscar_exemplares($codigo)
    {
        //instanciação da classe cliente do arquivo cliente da Model
        $mod = new reserva();
        //acessando os atributos do método ver da classe cliente
            $exemplares = $mod->buscar_exemplares($codigo);
            //retorno das informações
            return $exemplares;
    }

    public function buscarComp($codigo)
    {
        //instanciação da classe cliente do arquivo cliente da Model
        $mod = new reserva();
        //acessando os atributos do método ver da classe cliente
            $exemplares = $mod->buscarComp($codigo);
            //retorno das informações
            return $exemplares;
    }
}