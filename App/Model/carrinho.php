<?php
    namespace App\Model;
    require_once '../../src/vendor/autoload.php';
    use App\Model\persistencia;
    // Usando A Classe PDO
    use PDO;
    
    class carrinho {
        // Os Atributos Da Classe produto
        private $objecto;
        private $conexao;
    
        // Usando O Metódo Construtor Para Buscar Os Conteúdos Do Banco De Dados
        public function __construct() {     
            $this->objecto = new persistencia();
            $this->conexao = $this->objecto->conectarBD();
         }
         
         public function inserir($carrinho){
            $idExemplar = $carrinho['idExemplar'];
            $idUsuario = $carrinho['idUsuario'];

            $data = date("Y/m/d H:i:s"); 

            $stmt = $this->conexao->prepare("INSERT INTO tb_carrinho(idExemplar,idUsuario,dataRegisto,dataRemocao) values(:idExemplar,:idUsuario,:dataRegisto,:dataRemocao)");
            $stmt->execute([':idExemplar'=>$idExemplar,':idUsuario'=>$idUsuario,':dataRegisto'=>$data,':dataRemocao'=>$data]);
            
        }

        public function ver($id){
            $sql = "SELECT tb_exemplar.codExemplar, tb_exemplar.titulo, tb_exemplar.edicao, tb_categoria.descricao AS categoria FROM 
            tb_exemplar INNER JOIN tb_categoria ON tb_exemplar.idCategoria = tb_categoria.codCategoria INNER JOIN tb_carrinho ON tb_exemplar.codExemplar = tb_carrinho.idExemplar
            INNER JOIN tb_usuario ON tb_carrinho.idUsuario = tb_usuario.codUsuario WHERE tb_usuario.codUsuario = :id and tb_carrinho.dataRegisto = tb_carrinho.dataRemocao;";
          $stmt = $this->conexao->prepare($sql);
            $stmt->execute([':id'=>$id]);
            $exemplares = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $exemplares;
        }
        public function ler($id){
            $sql = "SELECT * from tb_carrinho WHERE id_cliente = :id;";
        
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute([':id'=>$id]);
            $carrinho = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $carrinho;
        }

        public function remover($codigo) 
        {
            $sql = "UPDATE tb_carrinho SET dataRemocao = :dataRemocao where idUsuario = :codigo";
            $stmt = $this->conexao->prepare($sql);
            $data = date('Y/m/d h:i:s');
            $stmt->execute([':dataRemocao'=>$data,':codigo'=>$codigo]);    
        }
        
        public function count(){
            $sql = "select count(*) from tb_carrinho;";
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result[0]['count(*)'];
        }
        }

          
?>