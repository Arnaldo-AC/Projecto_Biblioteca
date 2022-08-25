<?php
namespace App\Model;
use App\Model\persistencia;
use PDO;

class reserva {

    // Usando o método construct para que quando a classe reserva for instanciada, a conexão com a base de dados seja estabelecida
    public function __construct() {
        $this->objecto = new persistencia();
        $this->conexao = $this->objecto->conectarBD();
    }
    
    // Essa função nos permitirá fazer o cadastro do reserva, ele usa um parâmetro que é um array, contendo os atributos da tabela reserva.
    public function inserir($reserva) 
    {
    $dataReserva = $reserva['dataReserva'];
   // $comprovativo = $reserva['comprovativo'];
    $idUsuario = $reserva['idUsuario'];
 
    $extensao = strtolower(pathinfo($_FILES['comprovativo']['name'], PATHINFO_EXTENSION));
    $novo_nome = md5(time()).".".$extensao;
    $diretorio = "../../Public/Imagens/reservas/";  
    $data = date("Y/m/d H:i:s"); 
    if(move_uploaded_file($_FILES['comprovativo']['tmp_name'], $diretorio.$novo_nome))
    {
        $sql = "INSERT into tb_reserva(dataReserva,comprovativo,idUsuario,dataRegisto,dataRemocao) values(:dataReserva,:comprovativo,:idUsuario,:dataRegisto,:dataRemocao)"; // Comando SQL
        $stmt = $this->conexao->prepare($sql); //Preparação do comando SQL
        $stmt->execute([':dataReserva'=>$dataReserva,':comprovativo'=>$novo_nome,':idUsuario'=>$idUsuario,':dataRegisto'=>$data,':dataRemocao'=>$data]); // Execução do comando SQL com os parametros
         // Execução do comando SQL com os parametros
    }
    }
    public function inserir_exemplares($exemplar)
    {
        $reservas = $this->buscarUltId();
        foreach($reservas as $reserva)
        $codigo = $reserva['codReserva'];
        $sql1 = "INSERT into tb_exemplar_reserva(idReserva,idExemplar) values (:idReserva,:idExemplar)";
        $stmt1 = $this->conexao->prepare($sql1); //Preparação do comando SQL
        $stmt1->execute([':idReserva'=>$codigo,':idExemplar'=>$exemplar]);
    }

    private function buscarUltId(){
        
        $sql = "SELECT *from tb_reserva order by codReserva desc limit 1";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function buscarComp($codigo){
        
        $sql = "SELECT *from tb_reserva where codReserva = :codigo limit 1";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':codigo'=>$codigo]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listar_exemplares($codigo)
    {
        $sql = "SELECT E.codExemplar, concat(E.titulo, ', - ', C.descricao) as exemplar from tb_exemplar as E inner join tb_exemplar_reserva as ER
        on E.codExemplar = ER.idExemplar inner join tb_categoria as C on C.codCategoria = E.idCategoria where E.idReserva = :codigo and E.dataRegisto = E.dataRemocao";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':codigo'=>$codigo]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscar_exemplares($codigo)
    {
        $sql = "SELECT E.codExemplar, E.titulo, E.edicao, E.anoPub, ED.nome as editora, C.descricao as categoria from tb_exemplar as E inner join tb_exemplar_reserva as ER
        on E.codExemplar = ER.idExemplar inner join tb_categoria as C on C.codCategoria = E.idCategoria inner join tb_editora as ED on ED.codEditora = E.idEditora
         where ER.idReserva = :codigo and E.dataRegisto = E.dataRemocao";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':codigo'=>$codigo]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listar()
    {
        $sql = "SELECT DISTINCT R.codReserva, R.dataReserva, R.comprovativo, U.nome as usuario from tb_reserva as R inner join tb_exemplar_reserva as ER on
        ER.idReserva = R.codReserva inner join tb_exemplar as E on E.codExemplar = ER.idExemplar inner join tb_usuario as U on 
        R.idUsuario = U.codUsuario where R.dataRegisto = R.dataRemocao";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function alterar($reserva,$codigo) {
        $titulo = $reserva['titulo'];
        $deposito = $reserva['deposito'];
        $anoPub = $reserva['anoPub'];
        $isbn = $reserva['isbn'];
        $local = $reserva['local'];
        $edicao = $reserva['edicao'];
        $medida = $reserva['medida'];
        $idCategoria = $reserva['idCategoria'];
        $idEditora = $reserva['idEditora'];
        $area = $reserva['area'];
        $data = date("Y/m/d H:i:s");
        $arquivo = $_FILES['arquivo']['name'];  
        $extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));
        $novo_nome = md5(time()).".".$extensao;
        $diretorio = "../../../Public/Imagens/reservaes/";   
        if(move_uploaded_file($_FILES['arquivo'] ['tmp_name'], $diretorio.$novo_nome))
        {
        $sql = "UPDATE tb_reserva set titulo = :titulo, deposito = :deposito, anoPub = :anoPub, isbn = :isbn, localPub = :localPub, edicao = :edicao, 
        medida = :medida, idCategoria = :idCategoria, idEditora = :idEditora, area = :area, foto = :foto, dataAlteracao = :dataAlteracao where codreserva = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':titulo'=>$titulo,':deposito'=>$deposito,':anoPub'=>$anoPub,':isbn'=>$isbn,'localPub'=>$local,':edicao'=>$edicao,':medida'=>$medida,':idCategoria'=>$idCategoria,':idEditora'=>$idEditora,':area'=>$area,':foto'=>$novo_nome, ':dataAlteracao'=>$data, ':codigo'=>$codigo]);    
        }else
        {
        $sql = "UPDATE tb_reserva set titulo = :titulo, deposito = :deposito, anoPub = :anoPub, isbn = :isbn, localPub = :localPub, edicao = :edicao, 
        medida = :medida, idCategoria = :idCategoria, idEditora = :idEditora, area = :area, dataAlteracao = :dataAlteracao where codreserva = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':titulo'=>$titulo,':deposito'=>$deposito,':anoPub'=>$anoPub,':isbn'=>$isbn,'localPub'=>$local,':edicao'=>$edicao,':medida'=>$medida,':idCategoria'=>$idCategoria,':idEditora'=>$idEditora,':area'=>$area,':dataAlteracao'=>$data, ':codigo'=>$codigo]);    
        }
    }

    public function remover($codigo) {
        $sql = "UPDATE tb_reserva SET dataRemocao = :dataRemocao where codReserva = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $data = date('Y/m/d h:i:s');
        $stmt->execute([':dataRemocao'=>$data,':codigo'=>$codigo]);    
    }

    public function listarPorId($id)
    {
        $sql = "SELECT E.codreserva, E.titulo, E.deposito, E.anoPub, E.foto, E.isbn, E.localPub, E.edicao, E.medida, 
        C.descricao as categoria, Ed.nome as editora, E.area from tb_reserva as E inner join tb_categoria as C on C.codCategoria = E.idCategoria
        inner join tb_editora as Ed on Ed.codEditora = E.idCategoria where E.dataRegisto = E.dataRemocao and E.codreserva = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':codigo'=>$id]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // retornar na forma de uma array associativo, todos os autores do banco.
    }

    public function pesquisar($argumento)
    {
        $sql = "SELECT E.codreserva, E.titulo, E.deposito, E.anoPub, E.isbn, E.localPub, E.edicao, E.medida, 
        C.descricao as categoria, Ed.nome as editora, E.area from tb_reserva as E inner join tb_categoria as C on C.codCategoria = E.idCategoria
        inner join tb_editora as Ed on Ed.codEditora = E.idCategoria where E.titulo like :argumento.'%' or E.anoPub like :argumento.'%' or 
        E.isbn like :argumento.'%' or E.localPub like :argumento.'%' or E.edicao like :argumento.'%' or C.descricao like :argumento.'%'
        or Ed.nome like :argumento.'%' or E.area like :argumento.'%'";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':argumento'=>$argumento]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>