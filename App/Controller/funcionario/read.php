<?php
//criação da namespace para visualizar os clientes
namespace App\Controller\funcionario;
//inclusão do arquivo cliente da Model
use App\Model\funcionario;


//criação da classe read
class read
{
//criação do método publico ler
    public function ler()
    {
        //instanciação da classe cliente do arquivo cliente da Model
        $mod = new funcionario();
        //acessando os atributos do método ver da classe cliente
            $funcionarios = $mod->listar();
            //retorno das informações
            return $funcionarios;
    }
    public function buscarNivel()
    {
        $nivel = new funcionario();
        $niveis = $nivel->buscarNiveis();
        return $niveis;
    }
}