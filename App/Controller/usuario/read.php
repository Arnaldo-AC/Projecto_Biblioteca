<?php
//criação da namespace para visualizar os clientes
namespace App\Controller\usuario;
//inclusão do arquivo cliente da Model
use App\Model\usuario;


//criação da classe read
class read
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
    public function buscarNivel()
    {
        $nivel = new usuario();
        $niveis = $nivel->buscarNiveis();
        return $niveis;
    }
    public function buscarLeituras($codigo,$estado)
    {
        //instanciação da classe cliente do arquivo cliente da Model
        $mod = new usuario();
        //acessando os atributos do método ver da classe cliente
            $exemplares = $mod->listarLeituras($codigo,$estado);
            //retorno das informações
            return $exemplares;
    }
}