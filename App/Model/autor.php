<?php

namespace App\Model;
use App\Model\persistencia;
use PDO;

class autor {

    // Usando o método construct para que quando a classe autor for instanciada, a conexão com a base de dados seja estabelecida
    public function __construct() {
        $this->objecto = new persistencia();
        $this->conexao = $this->objecto->conectarBD();
    }
    
    // Essa função nos permitirá fazer o cadastro do autor, ele usa um parâmetro que é um array, contendo os atributos da tabela autor.
    public function inserir($autor) {
    $nome = $autor['nome'];
    $nacionalidade = $autor['nacionalidade'];
    $areaFormacao = $autor['area'];
    $cargo = $autor['cargo'];
    $genero = $autor['genero'];
    $dataNasc = $autor['dataNasc'];
    $data = date("Y/m/d H:i:s");
    $sql = "INSERT into tb_autor(nome,nacionalidade,areaFormacao,cargo,genero,dataNasc,dataRegisto,dataRemocao) values(:nome,:nacionalidade,:areaFormacao,:cargo,:genero,:dataNasc,:dataRegisto,:dataRemocao)"; // Comando SQL
    $stmt = $this->conexao->prepare($sql); //Preparação do comando SQL
    $stmt->execute([':nome'=>$nome,':nacionalidade'=>$nacionalidade,':areaFormacao'=>$areaFormacao,':cargo'=>$cargo,':genero'=>$genero,':dataNasc'=>$dataNasc,':dataRegisto'=>$data,':dataRemocao'=>$data]); // Execução do comando SQL com os parametros   
    }

    public function listar()
    {
        $sql = "SELECT codAutor, nome, nacionalidade, areaFormacao, cargo, genero, dataNasc from tb_autor where dataRegisto = dataRemocao";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // retornar na forma de uma array associativo, todos os autores do banco.
    }

    public function listarPorId($id)
    {
        $sql = "SELECT codAutor, nome, nacionalidade, areaFormacao, cargo, genero, dataNasc from tb_autor where dataRegisto = dataRemocao and codAutor = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':codigo'=>$id]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // retornar na forma de uma array associativo, todos os autores do banco.
    }

    public function alterar($autor,$codigo) {
        $nome = $autor['nome'];
        $nacionalidade = $autor['nacionalidade'];
        $areaFormacao = $autor['area'];
        $cargo = $autor['cargo'];
        $genero = $autor['genero'];
        $dataNasc = $autor['dataNasc'];
        $data = date("Y/m/d H:i:s");
        $sql = "UPDATE tb_autor set nome = :nome, nacionalidade = :nacionalidade, areaFormacao = :areaFormacao, cargo = :cargo, genero = :genero, dataNasc = :dataNasc, dataAlteracao = :dataAlteracao where codAutor = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':nome'=>$nome,':nacionalidade'=>$nacionalidade,':areaFormacao'=>$areaFormacao, ':dataNasc'=>$dataNasc, ':cargo'=>$cargo,':genero'=>$genero, ':codigo'=>$codigo, ':dataAlteracao'=>$data]);    
        }

        public function remover($codigo) 
        {
            $sql = "UPDATE tb_autor SET dataRemocao = :dataRemocao where codAutor = :codigo";
            $stmt = $this->conexao->prepare($sql);
            $data = date('Y/m/d h:i:s');
            $stmt->execute([':dataRemocao'=>$data,':codigo'=>$codigo]);    
        }

        public function buscarAutores($codigo) 
        {
        $sql = "SELECT nome, nacionalidade, areaFormacao, cargo, genero, dataNasc from tb_autor where codAutor = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':codigo'=>$codigo]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);    
        }

        public function pesquisar($argumento)
        {
        $sql = "SELECT codAutor, nome, nacionalidade, areaFormacao, cargo, genero, dataNasc from tb_autor where dataRegisto = dataRemocao 
        and (nome like :argumento.'%' or nacionalidade like :argumento.'%' or areaFormacao like :argumento.'%' or 
        cargo like :argumento.'%' or genero like :argumento.'%' or dataNasc like :argumento.'%')";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':argumento'=>$argumento]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
}

?>