<?php
    namespace App\Controller\carrinho;
    use App\Model\Carrinho;

    class read{

        public function buscar($id){ 
            $carrinho = new Carrinho();
            //verificacando se existe o método POST
            $carrinho = $carrinho->ver($id);
            //retorno das informações
            return $carrinho;   
        }

    }
?>