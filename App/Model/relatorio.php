<?php

namespace App\Model;
use App\Model\persistencia;
use PDO;

class relatorio {

    // Usando o método construct para que quando a classe autor for instanciada, a conexão com a base de dados seja estabelecida
    public function __construct() {
        $this->objecto = new persistencia();
        $this->conexao = $this->objecto->conectarBD();
    }
    
    // Essa função nos permitirá fazer o cadastro do autor, ele usa um parâmetro que é um array, contendo os atributos da tabela autor.
    public function buscarUsuario($descricao) 
    {
        $sql = "SELECT count(U.codUsuario) as contador from tb_usuario as U inner join tb_nivel as N on N.codNivel = U.idNivel
         where dataRegisto = dataRemocao and N.descricao = :descricao";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':descricao'=>$descricao]); // execução do comando SQL
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $dado)
        $codigo = $dado['contador'];

        return $codigo;
    }

    public function buscarExemplar() 
    {
        $sql = "SELECT count(*) as contador from tb_exemplar where dataRegisto = dataRemocao";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); // execução do comando SQL
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $dado)
        $codigo = $dado['contador'];

        return $codigo;
    }

    public function buscarExemplares($descricao) 
    {
        $sql = "SELECT count(E.codExemplar) as contador from tb_exemplar as E inner join tb_categoria as C
        on C.codCategoria = E.idCategoria where dataRegisto = dataRemocao and C.descricao = :descricao";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':descricao'=>$descricao]); // execução do comando SQL
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $dado)
        $codigo = $dado['contador'];

        return $codigo;
    }

    public function buscarEmprestimo() 
    {
        $sql = "SELECT count(*) as contador from tb_emprestimo where dataRegisto = dataRemocao";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); // execução do comando SQL
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $dado)
        $codigo = $dado['contador'];

        return $codigo;
    }
}

?>