<?php
namespace App\Model;
use App\Model\persistencia;
use PDO;

class funcionario {

    // Usando o método construct para que quando a classe funcionario for instanciada, a conexão com a base de dados seja estabelecida
    public function __construct() {
        $this->objecto = new persistencia();
        $this->conexao = $this->objecto->conectarBD();
    }
    
    // Essa função nos permitirá fazer o cadastro do funcionario, ele usa um parâmetro que é um array, contendo os atributos da tabela funcionario.
    public function inserir($funcionario) 
    {
    $nome = $funcionario['nome'];
    $bi = $funcionario['bi'];
    $genero = $funcionario['genero'];
    $dataNasc = $funcionario['dataNasc'];
    $telefone = $funcionario['telefone'];
    $email = $funcionario['email'];
    $municipio = $funcionario['municipio'];
    $distrito = $funcionario['distrito'];
    $bairro = $funcionario['bairro'];
    $senha = md5($funcionario['senha']);
    $cargo = $funcionario['cargo'];
    $idNivel = $funcionario['idNivel'];
    $data = date("Y/m/d H:i:s"); 
    $arquivo = $_FILES['foto']['name'];  
    $extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));
    $novo_nome = md5(time()).".".$extensao;
    $diretorio = "../../Public/Imagens/funcionarios/";   
    if(move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome))
    {
        $sql = "INSERT into tb_funcionario(nome,bi,genero,dataNasc,telefone,email,municipio,distrito,bairro,senha,cargo,idNivel,foto,dataRegisto,dataRemocao) values(:nome,:bi,:genero,:dataNasc,:telefone,:email,:municipio,:distrito,:bairro,:senha,:cargo,:idNivel,:foto,:dataRegisto,:dataRemocao)"; // Comando SQL
        $stmt = $this->conexao->prepare($sql); //Preparação do comando SQL
        $stmt->execute([':nome'=>$nome,':bi'=>$bi,':genero'=>$genero,':dataNasc'=>$dataNasc,'telefone'=>$telefone,':email'=>$email,':municipio'=>$municipio,':distrito'=>$distrito,':bairro'=>$bairro,':senha'=>$senha,':cargo'=>$cargo,':idNivel'=>$idNivel,':foto'=>$novo_nome,':dataRegisto'=>$data,':dataRemocao'=>$data]); // Execução do comando SQL com os parametros   
    }
    else
    {
        $novo_nome = 'picture2.png';
        $sql = "INSERT into tb_funcionario(nome,bi,genero,dataNasc,telefone,email,municipio,distrito,bairro,senha,cargo,idNivel,foto,dataRegisto,dataRemocao) values(:nome,:bi,:genero,:dataNasc,:telefone,:email,:municipio,:distrito,:bairro,:senha,:cargo,:idNivel,:foto,:dataRegisto,:dataRemocao)"; // Comando SQL
        $stmt = $this->conexao->prepare($sql); //Preparação do comando SQL
        $stmt->execute([':nome'=>$nome,':bi'=>$bi,':genero'=>$genero,':dataNasc'=>$dataNasc,'telefone'=>$telefone,':email'=>$email,':municipio'=>$municipio,':distrito'=>$distrito,':bairro'=>$bairro,':senha'=>$senha,':cargo'=>$cargo,':idNivel'=>$idNivel,':foto'=>$novo_nome,':dataRegisto'=>$data,':dataRemocao'=>$data]); // Execução do comando SQL com os parametros   
    }
    }
    public function listar()
    {
        $sql = "SELECT U.codFuncionario, U.nome, U.bi, U.foto, U.genero, U.dataNasc, U.telefone, U.email, concat(U.municipio, ', ', U.distrito,', ',U.bairro,', ') as endereco, 
        U.cargo, N.descricao as nivel from tb_funcionario as U inner join tb_nivel as N on N.codNivel = U.idNivel where U.dataRegisto = U.dataRemocao";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // retornar na forma de uma array associativo, todos os funcionarioes do banco.
    }

    public function logar()
    {
        $sql = "SELECT U.codFuncionario, U.nome, U.foto, U.bi, U.senha, U.genero, U.dataNasc, U.telefone, U.email, concat(U.municipio, ', ', U.distrito,', ',U.bairro,', ') as endereco, 
     N.descricao as nivel from tb_funcionario as U inner join tb_nivel as N on N.codNivel = U.idNivel where U.dataRegisto = U.dataRemocao";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // retornar na forma de uma array associativo, todos os funcionarioes do banco.
    }

    public function recuperar($funcionario,$senha)
    {
        $email = $funcionario['email'];
        $sql = "UPDATE tb_funcionario set senha = :senha where email = :email";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':senha'=>$senha,':email'=>$email]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // retornar na forma de uma array associativo, todos os funcionarioes do banco.
    }

    public function alterar($funcionario,$codigo) 
    {
        $nome = $funcionario['nome'];
        $bi = $funcionario['bi'];
        $genero = $funcionario['genero'];
        $dataNasc = $funcionario['dataNasc'];
        $telefone = $funcionario['telefone'];
        $email = $funcionario['email'];
        $municipio = $funcionario['municipio'];
        $distrito = $funcionario['distrito'];
        $bairro = $funcionario['bairro'];
        $senha = $funcionario['senha'];
        $numfuncionario = $funcionario['numfuncionario'];
        $idNivel = $funcionario['idNivel'];
        $data = date("Y/m/d H:i:s"); 
        $arquivo = $_FILES['foto']['name'];  
        $extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));
        $diretorio = "../../Public/Imagens/funcionarios/";   
        if(move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome))
        {
        $sql = "UPDATE tb_funcionario set nome = :nome, bi = :bi, genero = :genero, dataNasc = :dataNasc, telefone = :telefone, email = :email, 
        municipio = :municipio, distrito = :distrito, bairro = :bairro, senha = :senha, numfuncionario = :numfuncionario, idNivel = :idNivel, foto = :foto where codfuncionario = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':nome'=>$nome,':bi'=>$bi,':genero'=>$genero,':dataNasc'=>$dataNasc,'telefone'=>$telefone,':email'=>$email,':municipio'=>$municipio,':distrito'=>$distrito,':bairro'=>$bairro, ':senha'=>$senha,':numfuncionario'=>$numfuncionario,':idNivel'=>$idNivel,':foto'=>$foto, ':codigo'=>$codigo]);    
        }
        else
        {
        $sql = "UPDATE tb_funcionario set nome = :nome, bi = :bi, genero = :genero, dataNasc = :dataNasc, telefone = :telefone, email = :email, 
        municipio = :municipio, distrito = :distrito, bairro = :bairro, senha = :senha, numfuncionario = :numfuncionario, idNivel = :idNivel where codfuncionario = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':nome'=>$nome,':bi'=>$bi,':genero'=>$genero,':dataNasc'=>$dataNasc,'telefone'=>$telefone,':email'=>$email,':municipio'=>$municipio,':distrito'=>$distrito,':bairro'=>$bairro, ':senha'=>$senha,':numfuncionario'=>$numfuncionario,':idNivel'=>$idNivel, ':codigo'=>$codigo]);
        }
    }
    public function remover($codigo) 
    {
        $sql = "UPDATE tb_funcionario SET dataRemocao = :dataRemocao where codfuncionario = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $data = date('Y/m/d h:i:s');
        $stmt->execute([':dataRemocao'=>$data,':codigo'=>$codigo]);    
    }
    public function buscarNiveis()
    {
        $sql = "SELECT *from tb_nivel where descricao = 'Admin' or descricao = 'Bibliotecário'";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarPorId($id)
    {
        $sql = "SELECT U.codfuncionario, U.nome, U.bi, U.senha, U.genero, U.dataNasc, U.telefone, U.email, concat(U.municipio, ', ', U.distrito,', ',U.bairro,', ') as endereco, 
        U.numfuncionario, N.descricao as nivel from tb_funcionario as U inner join tb_nivel as N on N.codNivel = U.idNivel where U.dataRegisto = U.dataRemocao and U.codfuncionario = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':codigo'=>$id]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // retornar na forma de uma array associativo, todos os autores do banco.
    }

    public function pesquisar($argumento)
    {
        $sql = "SELECT E.codExemplar, E.titulo, E.deposito, E.anoPub, E.isbn, E.localPub, E.edicao, E.medida, 
        C.descricao as categoria, Ed.nome as editora, E.area from tb_exemplar as E inner join tb_categoria as C on C.codCategoria = E.idCategoria
        inner join tb_editora as Ed on Ed.codEditora = E.idCategoria where E.titulo like :argumento.'%' or E.anoPub like :argumento.'%' or 
        E.isbn like :argumento.'%' or E.localPub like :argumento.'%' or E.edicao like :argumento.'%' or C.descricao like :argumento.'%'
        or Ed.nome like :argumento.'%' or E.area like :argumento.'%'";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':argumento'=>$argumento]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>