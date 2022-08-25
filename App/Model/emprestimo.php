<?php
namespace App\Model;
use App\Model\persistencia;
use PDO;

class emprestimo 
{
    public function __construct() 
    {
    $this->objecto = new persistencia();
    $this->conexao = $this->objecto->conectarBD();
    }
    
    public function inserir($emprestimo) 
    {
    $dataEmprestimo = $emprestimo['dataEmprestimo'];
    $dataDevolucao = date("Y/m/d H:i:s", strtotime($dataEmprestimo.'+ 3 days'));
    $estado = $emprestimo['estado'];
    $idReserva = $emprestimo['idReserva'];
    $idFuncionario = $emprestimo['idFuncionario'];
    $data = date("Y/m/d H:i:s"); 
    $sql = "INSERT into tb_emprestimo(dataEmprestimo,dataDevolucao,idReserva,estado,idFuncionario,dataRegisto,dataRemocao) values(:dataEmprestimo,:dataDevolucao,:idReserva,:estado,:idFuncionario,:dataRegisto,:dataRemocao)"; // Comando SQL
    $stmt = $this->conexao->prepare($sql); //Preparação do comando SQL
    $stmt->execute([':dataEmprestimo'=>$dataEmprestimo,':dataDevolucao'=>$dataDevolucao,':idReserva'=>$idReserva,':estado'=>$estado,':idFuncionario'=>$idFuncionario,':dataRegisto'=>$data,':dataRemocao'=>$data]); // Execução do comando SQL com os parametros
    }

    public function listar()
    {
        $sql = "SELECT EM.codEmprestimo, EM.dataEmprestimo, EM.dataDevolucao, U.nome solicitante, F.nome funcionario from tb_emprestimo as EM inner join tb_reserva as R on
        EM.idReserva = R.codReserva inner join tb_usuario as U on 
        R.idUsuario = U.codUsuario inner join tb_funcionario as F on F.codFuncionario = EM.idFuncionario where EM.dataRegisto = EM.dataRemocao";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function buscarUsuario($codigo)
    {
        $sql = "SELECT idUsuario from tb_reserva where dataRegisto = dataRemocao and idReserva = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':codigo'=>$codigo]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function alterar($emprestimo,$codigo) 
    {
        $titulo = $emprestimo['titulo'];
        $deposito = $emprestimo['deposito'];
        $anoPub = $emprestimo['anoPub'];
        $isbn = $emprestimo['isbn'];
        $local = $emprestimo['local'];
        $edicao = $emprestimo['edicao'];
        $medida = $emprestimo['medida'];
        $idCategoria = $emprestimo['idCategoria'];
        $idEditora = $emprestimo['idEditora'];
        $area = $emprestimo['area'];
        $data = date("Y/m/d H:i:s");
        $arquivo = $_FILES['arquivo']['name'];  
        $extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));
        $novo_nome = md5(time()).".".$extensao;
        $diretorio = "../../../Public/Imagens/emprestimoes/";   
        if(move_uploaded_file($_FILES['arquivo'] ['tmp_name'], $diretorio.$novo_nome))
        {
        $sql = "UPDATE tb_emprestimo set titulo = :titulo, deposito = :deposito, anoPub = :anoPub, isbn = :isbn, localPub = :localPub, edicao = :edicao, 
        medida = :medida, idCategoria = :idCategoria, idEditora = :idEditora, area = :area, foto = :foto, dataAlteracao = :dataAlteracao where codemprestimo = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':titulo'=>$titulo,':deposito'=>$deposito,':anoPub'=>$anoPub,':isbn'=>$isbn,'localPub'=>$local,':edicao'=>$edicao,':medida'=>$medida,':idCategoria'=>$idCategoria,':idEditora'=>$idEditora,':area'=>$area,':foto'=>$novo_nome, ':dataAlteracao'=>$data, ':codigo'=>$codigo]);    
        }else
        {
        $sql = "UPDATE tb_emprestimo set titulo = :titulo, deposito = :deposito, anoPub = :anoPub, isbn = :isbn, localPub = :localPub, edicao = :edicao, 
        medida = :medida, idCategoria = :idCategoria, idEditora = :idEditora, area = :area, dataAlteracao = :dataAlteracao where codemprestimo = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':titulo'=>$titulo,':deposito'=>$deposito,':anoPub'=>$anoPub,':isbn'=>$isbn,'localPub'=>$local,':edicao'=>$edicao,':medida'=>$medida,':idCategoria'=>$idCategoria,':idEditora'=>$idEditora,':area'=>$area,':dataAlteracao'=>$data, ':codigo'=>$codigo]);    
        }
    }

    public function remover($codigo)
    {
        $sql = "UPDATE tb_emprestimo SET dataRemocao = :dataRemocao, estado = :estado where codEmprestimo = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $estado = "devolvido";
        $data = date('Y/m/d h:i:s');
        $stmt->execute([':dataRemocao'=>$data,':estado'=>$estado,':codigo'=>$codigo]);    
        $this->diminuirStock($codigo);
    }

    private function diminuirStock($codigo)
    {
        $exemplares = $this->buscar1Exemplar($codigo);
        foreach($exemplares as $exemplar)
        $cod = $exemplar['codExemplar'];
        $sql = "UPDATE tb_exemplar SET quantidade = (quantidade - 1) where codExemplar = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $estado = "devolvido";
        $data = date('Y/m/d h:i:s');
        $stmt->execute([':codigo'=>$cod]);    
    }
/*
    private function diminuirStock($codigo)
    {
        $sql = "UPDATE tb_exemplar SET quantidade = (quantidade - 1) where codExemplar = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $estado = "devolvido";
        $data = date('Y/m/d h:i:s');
        $stmt->execute([':codigo'=>$codigo]);    
    }
*/
    private function buscar1Exemplar($codigo)
    {
        $sql = "SELECT E.codExemplar from tb_exemplar as E inner join tb_exemplar_reserva as ER on ER.idExemplar = E.codExemplar
        inner join tb_reserva as R on R.codReserva = ER.idReserva inner join tb_emprestimo as EM on EM.idReserva = R.codReserva where R.codReserva = :codigo limit 1";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':codigo'=>$codigo]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function buscarEmailUsuario($idReserva)
    {
        $sql = "SELECT U.email from tb_usuario as U inner join tb_reserva as R on R.idUsuario = U.codUsuario
        where R.codReserva = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':codigo'=>$codigo]); // execução do comando SQL
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $dado)
        $codigo = $dado['codigo'];
    }

    public function pesquisar($argumento)
    {
        $sql = "SELECT E.codemprestimo, E.titulo, E.deposito, E.anoPub, E.isbn, E.localPub, E.edicao, E.medida, 
        C.descricao as categoria, Ed.nome as editora, E.area from tb_emprestimo as E inner join tb_categoria as C on C.codCategoria = E.idCategoria
        inner join tb_editora as Ed on Ed.codEditora = E.idCategoria where E.titulo like :argumento.'%' or E.anoPub like :argumento.'%' or 
        E.isbn like :argumento.'%' or E.localPub like :argumento.'%' or E.edicao like :argumento.'%' or C.descricao like :argumento.'%'
        or Ed.nome like :argumento.'%' or E.area like :argumento.'%'";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':argumento'=>$argumento]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>