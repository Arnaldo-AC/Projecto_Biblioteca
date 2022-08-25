<?php

namespace App\Model;
use App\Model\persistencia;
use PDO;

class editora {

    // Usando o método construct para que quando a classe editora for instanciada, a conexão com a base de dados seja estabelecida
    public function __construct() {
        $this->objecto = new persistencia();
        $this->conexao = $this->objecto->conectarBD();
    }
    
    // Essa função nos permitirá fazer o cadastro do editora, ele usa um parâmetro que é um array, contendo os atributos da tabela editora.
    public function inserir($editora) {
    $nome = $editora['nome'];
    $pais = $editora['pais'];
    $cidade = $editora['cidade'];
    $email = $editora['email'];
    $telefone = $editora['telefone'];
    $data = date("Y/m/d H:i:s");
    $sql = "INSERT into tb_editora(nome,pais,cidade,email,telefone,dataRegisto,dataRemocao) values(:nome,:pais,:cidade,:email,:telefone,:dataRegisto,:dataRemocao)"; // Comando SQL
    $stmt = $this->conexao->prepare($sql); //Preparação do comando SQL
    $stmt->execute([':nome'=>$nome,':pais'=>$pais,':cidade'=>$cidade,':email'=>$email,':telefone'=>$telefone,':dataRegisto'=>$data,':dataRemocao'=>$data]); // Execução do comando SQL com os parametros   
    }

    public function listar()
    {
        $sql = "SELECT codEditora, nome, concat(cidade,', ',pais) as endereco, email, telefone from tb_editora where dataRegisto = dataRemocao";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // retornar na forma de uma array associativo, todos os editoraes do banco.
    }

    public function alterar($editora,$codigo) 
    {
        $nome = $editora['nome'];
        $pais = $editora['pais'];
        $cidade = $editora['cidade'];
        $email = $editora['email'];
        $telefone = $editora['telefone'];
        $sql = "UPDATE tb_editora set nome = :nome, pais = :pais, cidade = :cidade, email = :email, telefone = :telefone where codEditora = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':nome'=>$nome,':pais'=>$pais,':cidade'=>$cidade,':email'=>$email,':telefone'=>$telefone, ':codigo'=>$codigo]);    
    }

    public function listarPorId($id)
    {
        $sql = "SELECT  *from tb_editora where dataRegisto = dataRemocao and codEditora = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':codigo'=>$id]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // retornar na forma de uma array associativo, todos os autores do banco.
    }

    public function remover($codigo) 
    {
            $sql = "UPDATE tb_editora SET dataRemocao = :dataRemocao where codEditora = :codigo";
            $stmt = $this->conexao->prepare($sql);
            $data = date('Y/m/d h:i:s');
            $stmt->execute([':dataRemocao'=>$data,':codigo'=>$codigo]);  
    }

    public function pesquisar($argumento)
    {
    $sql = "SELECT codEditora, nome, concat(cidade,', ',pais) as endereco, email, telefone from tb_editora where dataRegisto = dataRemocao    and (nome like :argumento.'%' or nacionalidade like :argumento.'%' or areaFormacao like :argumento.'%' or 
    nome like :argumento.'%' or cidade like :argumento.'%' or pais like :argumento.'%' or email like :argumento.'%' or telefone like :argumento.'%')";
    $stmt = $this->conexao->prepare($sql);
    $stmt->execute([':argumento'=>$argumento]); // execução do comando SQL
    return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>