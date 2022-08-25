<?php
namespace App\Model;
use App\Model\persistencia;
use PDO;

class usuario {

    // Usando o método construct para que quando a classe usuario for instanciada, a conexão com a base de dados seja estabelecida
    public function __construct() {
        $this->objecto = new persistencia();
        $this->conexao = $this->objecto->conectarBD();
    }
    
    // Essa função nos permitirá fazer o cadastro do usuario, ele usa um parâmetro que é um array, contendo os atributos da tabela usuario.
    public function inserir($usuario) 
    {
    $nome = $usuario['nome'];
    $bi = $usuario['bi'];
    $genero = $usuario['genero'];
    $dataNasc = $usuario['dataNasc'];
    $telefone = $usuario['telefone'];
    $email = $usuario['email'];
    $municipio = $usuario['municipio'];
    $distrito = $usuario['distrito'];
    $bairro = $usuario['bairro'];
    $senha = md5($usuario['senha']);
    $curso = $usuario['curso'];
    $numUsuario = $usuario['numUsuario'];
    $idNivel = $usuario['idNivel'];
    $data = date("Y/m/d H:i:s"); 
    $arquivo = $_FILES['foto']['name'];  
    $extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));
    $novo_nome = md5(time()).".".$extensao;
    $diretorio = "../../Public/Imagens/Usuarios/";   
    if(move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome))
    {
        $sql = "INSERT into tb_usuario(nome,bi,genero,dataNasc,telefone,email,municipio,distrito,bairro,senha,curso,numUsuario,idNivel,foto,dataRegisto,dataRemocao) values(:nome,:bi,:genero,:dataNasc,:telefone,:email,:municipio,:distrito,:bairro,:senha,:curso,:numUsuario,:idNivel,:foto,:dataRegisto,:dataRemocao)"; // Comando SQL
        $stmt = $this->conexao->prepare($sql); //Preparação do comando SQL
        $stmt->execute([':nome'=>$nome,':bi'=>$bi,':genero'=>$genero,':dataNasc'=>$dataNasc,'telefone'=>$telefone,':email'=>$email,':municipio'=>$municipio,':distrito'=>$distrito,':bairro'=>$bairro,':senha'=>$senha, ':curso'=>$curso,':numUsuario'=>$numUsuario,':idNivel'=>$idNivel,':foto'=>$novo_nome,':dataRegisto'=>$data,':dataRemocao'=>$data]); // Execução do comando SQL com os parametros   
    }
    else
    {
        $novo_nome = 'picture2.png';
        $sql = "INSERT into tb_usuario(nome,bi,genero,dataNasc,telefone,email,municipio,distrito,bairro,senha,curso,numUsuario,idNivel,foto,dataRegisto,dataRemocao) values(:nome,:bi,:genero,:dataNasc,:telefone,:email,:municipio,:distrito,:bairro,:senha,:curso,:numUsuario,:idNivel,:foto,:dataRegisto,:dataRemocao)"; // Comando SQL
        $stmt = $this->conexao->prepare($sql); //Preparação do comando SQL
        $stmt->execute([':nome'=>$nome,':bi'=>$bi,':genero'=>$genero,':dataNasc'=>$dataNasc,'telefone'=>$telefone,':email'=>$email,':municipio'=>$municipio,':distrito'=>$distrito,':bairro'=>$bairro,':senha'=>$senha, ':curso'=>$curso,':numUsuario'=>$numUsuario,':idNivel'=>$idNivel,':foto'=>$novo_nome,':dataRegisto'=>$data,':dataRemocao'=>$data]); // Execução do comando SQL com os parametros   
    }
    }

    private function verificaEmail($email)
    {
        $sql = "SELECT *from tb_usuario where email = :email";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':email'=>$email]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // retornar na forma de uma array associativo, todos os funcionarioes do banco.
    }

    public function inserir_codigo($usuario) 
    {
    $email = $usuario['email'];
    $senha = time();
    $t = strlen($senha);
    $novaSenha = substr(md5(md5($senha)),$t-7,6);
    $codigo = $novaSenha;
    $verEmail = $this->verificaEmail($email);
    $i=0;
    foreach($verEmail as $mail)
    $i++;
    if($i == 0)
    {
        $sql = "INSERT into tb_verificacao(email,codigo) values(:email,:codigo)"; // Comando SQL
        $stmt = $this->conexao->prepare($sql); //Preparação do comando SQL
        $stmt->execute([':email'=>$email,':codigo'=>$codigo]); // Execução do comando SQL com os parametros   
    }
    else
    if($i == 1)
    {
        $sql = "UPDATE tb_verificacao set codigo = :codigo where email = :email"; // Comando SQL
        $stmt = $this->conexao->prepare($sql); //Preparação do comando SQL
        $stmt->execute([':email'=>$email,':codigo'=>$codigo]); // Execução do comando SQL com os parametros   
    }
    }

    public function buscarCodigo($email)
    {
        $sql = "SELECT codigo from tb_verificacao where email = :email";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':email'=>$email]); // execução do comando SQL
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $dado)
        $codigo = $dado['codigo'];

        return $codigo;
    }
    public function listar()
    {
        $sql = "SELECT U.codUsuario, U.nome, U.bi, U.foto, U.genero, U.dataNasc, U.telefone, U.email, concat(U.municipio, ', ', U.distrito,', ',U.bairro,', ') as endereco, 
        U.numUsuario, N.descricao as nivel from tb_usuario as U inner join tb_nivel as N on N.codNivel = U.idNivel where U.dataRegisto = U.dataRemocao";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // retornar na forma de uma array associativo, todos os usuarioes do banco.
    }

    public function recuperar($usuario)
    {
        $email = $usuario['email'];
        $senha = ($usuario['senha']);
        $sql = "UPDATE tb_usuario set senha = :senha where email = :email";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':senha'=>$senha,':email'=>$email]); // execução do comando SQL
     //   return $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // retornar na forma de uma array associativo, todos os funcionarioes do banco.
    }

    public function buscar($email,$senha)
    {
        $sql = "SELECT *from tb_usuario where senha = :senha and email = :email";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':senha'=>$senha,':email'=>$email]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // retornar na forma de uma array associativo, todos os funcionarioes do banco.
    }

    public function logar()
    {
        $sql = "SELECT U.codUsuario, U.nome, U.foto, U.bi, U.senha, U.genero, U.dataNasc, U.telefone, U.email, concat(U.municipio, ', ', U.distrito,', ',U.bairro,', ') as endereco, 
        U.numUsuario, N.descricao as nivel from tb_usuario as U inner join tb_nivel as N on N.codNivel = U.idNivel where U.dataRegisto = U.dataRemocao";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // retornar na forma de uma array associativo, todos os usuarioes do banco.
    }

    public function alterar($usuario,$codigo) 
    {
        $nome = $usuario['nome'];
        $bi = $usuario['bi'];
        $genero = $usuario['genero'];
        $dataNasc = $usuario['dataNasc'];
        $telefone = $usuario['telefone'];
        $email = $usuario['email'];
        $municipio = $usuario['municipio'];
        $distrito = $usuario['distrito'];
        $bairro = $usuario['bairro'];
        $senha = $usuario['senha'];
        $numUsuario = $usuario['numUsuario'];
        $idNivel = $usuario['idNivel'];
        $data = date("Y/m/d H:i:s"); 
        $arquivo = $_FILES['foto']['name'];  
        $extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));
        $diretorio = "../../Public/Imagens/Usuarios/";   
        if(move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome))
        {
        $sql = "UPDATE tb_usuario set nome = :nome, bi = :bi, genero = :genero, dataNasc = :dataNasc, telefone = :telefone, email = :email, 
        municipio = :municipio, distrito = :distrito, bairro = :bairro, senha = :senha, numUsuario = :numUsuario, idNivel = :idNivel, foto = :foto where codUsuario = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':nome'=>$nome,':bi'=>$bi,':genero'=>$genero,':dataNasc'=>$dataNasc,'telefone'=>$telefone,':email'=>$email,':municipio'=>$municipio,':distrito'=>$distrito,':bairro'=>$bairro, ':senha'=>$senha,':numUsuario'=>$numUsuario,':idNivel'=>$idNivel,':foto'=>$foto, ':codigo'=>$codigo]);    
        }
        else
        {
        $sql = "UPDATE tb_usuario set nome = :nome, bi = :bi, genero = :genero, dataNasc = :dataNasc, telefone = :telefone, email = :email, 
        municipio = :municipio, distrito = :distrito, bairro = :bairro, senha = :senha, numUsuario = :numUsuario, idNivel = :idNivel where codUsuario = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':nome'=>$nome,':bi'=>$bi,':genero'=>$genero,':dataNasc'=>$dataNasc,'telefone'=>$telefone,':email'=>$email,':municipio'=>$municipio,':distrito'=>$distrito,':bairro'=>$bairro, ':senha'=>$senha,':numUsuario'=>$numUsuario,':idNivel'=>$idNivel, ':codigo'=>$codigo]);
        }
    }
    public function remover($codigo) 
    {
        $sql = "UPDATE tb_usuario SET dataRemocao = :dataRemocao where codUsuario = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $data = date('Y/m/d h:i:s');
        $stmt->execute([':dataRemocao'=>$data,':codigo'=>$codigo]);    
    }
    public function buscarNiveis()
    {
        $sql = "SELECT *from tb_nivel where descricao = 'Professor' or descricao = 'Aluno'";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarPorId($id)
    {
        $sql = "SELECT U.codUsuario, U.nome, U.bi, U.senha, U.genero, U.dataNasc, U.telefone, U.email, concat(U.municipio, ', ', U.distrito,', ',U.bairro,', ') as endereco, 
        U.numUsuario, N.descricao as nivel from tb_usuario as U inner join tb_nivel as N on N.codNivel = U.idNivel where U.dataRegisto = U.dataRemocao and U.codUsuario = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':codigo'=>$id]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // retornar na forma de uma array associativo, todos os autores do banco.
    }

    public function listarLeituras($id,$estado)
    {
        $sql = "SELECT E.titulo, C.descricao as categoria, E.edicao, EM.dataEmprestimo, EM.dataDevolucao from tb_exemplar as E inner join tb_categoria as C
        on E.idCategoria = C.codCategoria inner join tb_exemplar_reserva as ER on ER.idExemplar = E.codExemplar inner join tb_reserva as R on 
        R.codReserva = ER.idReserva inner join tb_usuario as U on U.codUsuario = R.idUsuario inner join tb_emprestimo as EM on EM.idReserva = R.codReserva
        where U.codUsuario = :codigo and EM.estado = :estado";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':codigo'=>$id,':estado'=>$estado]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // retornar na forma de uma array associativo, todos os autores do banco.
    }

    public function listarReservas($id)
    {
        $sql = "SELECT U.codUsuario, U.nome, U.bi, U.senha, U.genero, U.dataNasc, U.telefone, U.email, concat(U.municipio, ', ', U.distrito,', ',U.bairro,', ') as endereco, 
        U.numUsuario, N.descricao as nivel from tb_usuario as U inner join tb_nivel as N on N.codNivel = U.idNivel where U.dataRegisto = U.dataRemocao and U.codUsuario = :codigo";
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