<?php
//criação da namespace para inserir os reservase
namespace App\Controller\reserva;
//inclusão do arquivo reserva da Model
use App\Model\reserva;

//criação da classe inserir
class insert
{
//criação do método publico inserir_reserva
    public function inserir()
    {
       
    //instanciação da classe reserva do arquivo reserva da Model
        $mod = new reserva();
    //verificacando se existe o método POST
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    //Se existir, então a variavel $reservaes vai guardar os dados recebidos
    if(isset($_REQUEST['exemplar']))
    {
        //echo "Olá";
        $reservas = [
            'dataReserva'=> $_REQUEST['dataReserva'],
            'idUsuario'=> $_REQUEST['idUsuario']
            ];
        //enviando os dados da variavel $reservaes para o método inserir da classe reserva
        $mod->inserir($reservas);

        $exemplar = $_REQUEST['exemplar'];
        for($i=0; $i < count($exemplar); $i++)
        {
            $mod->inserir_exemplares($exemplar[$i]);
        } 
    }
        
	}
    
    }
  
}