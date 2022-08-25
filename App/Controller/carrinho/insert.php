<?php
    namespace App\Controller\carrinho;
    use App\Model\carrinho;

    class insert{

        public function inserir(){ 
            $carrinho = new Carrinho();
            //verificacando se existe o método POST
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
            //Se existir, então array $fornecedores vai guardar os dados recebidos
                $carrinhos = [
                    'idExemplar'=> $_REQUEST['idExemplar'],
                    'idUsuario'=> $_REQUEST['idUsuario']
                ];
                //enviando os dados alocados no array $fornecedores para o método inserir da classe fornecedor
                $carrinho->inserir($carrinhos);
            }   
        }

    }
?>