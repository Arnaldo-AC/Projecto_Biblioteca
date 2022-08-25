<?php
    // Criação Do Namespace Do Arquivo
    namespace App\Model;
    // Usando A Classe PDO Para Facilitar A Conexão
    use PDO;
    // Criação Da Classe De Conexão
    class persistencia {
    // Criação De Variavéis De Conexão
       private $host = "127.0.0.1";
       private $db_name = "db_biblioteca";
       private $user = "root";
       private $password = "";
       public $conn;
        // Criação Do Método Que Irá Conectar A Base De Dados
       public function conectarBD() {
        // Inicialização Da Variavel Que Vai Guardar A Conexão
        $this->conn = NULL;

        // Usar O Try Catch Para Verificar O Erro Na Conexão
        try {

            $this->conn = new PDO("mysql:dbname=" . $this->db_name . ";host=" . $this->host
            . ":3306;charset=UTF8", '' . $this->user . '', '' . $this->password . '');
        }
        catch(PDOException $erro)
        {
            echo $erro->getMessage();
        }
        if(!$this->conn)
        {
            echo "Erro de conexão";
        }
        else
        {
            return $this->conn;
        }

       }
    }
?>