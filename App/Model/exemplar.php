<?php
namespace App\Model;
use App\Model\persistencia;
use PDO;

class exemplar {

    // Usando o método construct para que quando a classe exemplar for instanciada, a conexão com a base de dados seja estabelecida
    public function __construct() {
        $this->objecto = new persistencia();
        $this->conexao = $this->objecto->conectarBD();
    }
    
    // Essa função nos permitirá fazer o cadastro do exemplar, ele usa um parâmetro que é um array, contendo os atributos da tabela exemplar.
    public function inserir($exemplar) 
    {
    $titulo = $exemplar['titulo'];
    $deposito = $exemplar['deposito'];
    $anoPub = $exemplar['anoPub'];
    $isbn = $exemplar['isbn'];
    $local = $exemplar['local'];
    $edicao = $exemplar['edicao'];
    $medida = $exemplar['medida'];
    $idCategoria = $exemplar['idCategoria'];
    $idEditora = $exemplar['idEditora'];
    $area = $exemplar['area'];
 
    $extensao = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
    $novo_nome = md5(time()).".".$extensao;
    $diretorio = "../../Public/Imagens/Exemplares/";  
    $data = date("Y/m/d H:i:s"); 
    if(move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome))
    {
        $sql = "INSERT into tb_exemplar(titulo,deposito,anoPub,isbn,localPub,edicao,medida,idCategoria,idEditora,area,foto,dataRegisto,dataRemocao) values(:titulo,:deposito,:anoPub,:isbn,:localPub,:edicao,:medida,:idCategoria,:idEditora,:area,:foto,:dataRegisto,:dataRemocao)"; // Comando SQL
        $stmt = $this->conexao->prepare($sql); //Preparação do comando SQL
        $stmt->execute([':titulo'=>$titulo,':deposito'=>$deposito,':anoPub'=>$anoPub,':isbn'=>$isbn,'localPub'=>$local,':edicao'=>$edicao,':medida'=>$medida,':idCategoria'=>$idCategoria,':idEditora'=>$idEditora,':area'=>$area,':foto'=>$novo_nome,':dataRegisto'=>$data,':dataRemocao'=>$data]); // Execução do comando SQL com os parametros
         // Execução do comando SQL com os parametros
    }
    else
    {
        $novo_nome = "picture2.png";
        $sql = "INSERT into tb_exemplar(titulo,deposito,anoPub,isbn,localPub,edicao,medida,idCategoria,idEditora,area,foto,dataRegisto,dataRemocao) values(:titulo,:deposito,:anoPub,:isbn,:localPub,:edicao,:medida,:idCategoria,:idEditora,:area,:foto,:dataRegisto,:dataRemocao)"; // Comando SQL
        $stmt = $this->conexao->prepare($sql); //Preparação do comando SQL
        $stmt->execute([':titulo'=>$titulo,':deposito'=>$deposito,':anoPub'=>$anoPub,':isbn'=>$isbn,'localPub'=>$local,':edicao'=>$edicao,':medida'=>$medida,':idCategoria'=>$idCategoria,':idEditora'=>$idEditora,':area'=>$area,':foto'=>$novo_nome,':dataRegisto'=>$data,':dataRemocao'=>$data]);

    }
    }
    public function inserir_autores($autor)
    {
        $exemplares = $this->buscarUltId();
        foreach($exemplares as $exemplar)
        $codigo = $exemplar['codExemplar'];
        $sql1 = "INSERT into tb_exemplar_autor(idExemplar,idAutor) values (:idExemplar,:idAutor)";
        $stmt1 = $this->conexao->prepare($sql1); //Preparação do comando SQL
        $stmt1->execute([':idExemplar'=>$codigo,':idAutor'=>$autor]);
    }
    private function buscarUltId(){
        
        $sql = "SELECT *from tb_exemplar order by codExemplar desc limit 1";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listar_autores($codigo)
    {
        $sql = "SELECT A.nome from tb_exemplar_autor as E inner join tb_autor as A
        on A.codAutor = E.idAutor where E.idExemplar = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':codigo'=>$codigo]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listar()
    {
        $sql = "SELECT E.codExemplar, E.titulo, E.deposito, E.anoPub, E.quantidade, E.isbn, E.foto, E.localPub, E.edicao, E.medida, 
        C.descricao as categoria, Ed.nome as editora, E.area from tb_exemplar as E inner join tb_categoria as C on C.codCategoria = E.idCategoria
        inner join tb_editora as Ed on Ed.codEditora = E.idCategoria where E.dataRegisto = E.dataRemocao and E.quantidade > 0";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscar6Ult($categoria)
    {
        $sql = "SELECT E.codExemplar, E.titulo, E.deposito, E.anoPub, E.isbn, E.foto, E.localPub, E.edicao, E.medida, 
        C.descricao as categoria, Ed.nome as editora, E.area from tb_exemplar as E inner join tb_categoria as C on C.codCategoria = E.idCategoria
        inner join tb_editora as Ed on Ed.codEditora = E.idCategoria where E.dataRegisto = E.dataRemocao and C.descricao = :categoria and E.quantidade > 0 order by E.codExemplar desc limit 6";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':categoria'=>$categoria]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarTodos($categoria)
    {
        $sql = "SELECT E.codExemplar, E.titulo, E.deposito, E.anoPub, E.isbn, E.foto, E.localPub, E.edicao, E.medida, 
        C.descricao as categoria, Ed.nome as editora, E.area from tb_exemplar as E inner join tb_categoria as C on C.codCategoria = E.idCategoria
        inner join tb_editora as Ed on Ed.codEditora = E.idCategoria where E.dataRegisto = E.dataRemocao and C.descricao = :categoria and E.quantidade > 0";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':categoria'=>$categoria]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function alterar($exemplar,$codigo) {
        $titulo = $exemplar['titulo'];
        $deposito = $exemplar['deposito'];
        $anoPub = $exemplar['anoPub'];
        $isbn = $exemplar['isbn'];
        $local = $exemplar['local'];
        $edicao = $exemplar['edicao'];
        $medida = $exemplar['medida'];
        $idCategoria = $exemplar['idCategoria'];
        $idEditora = $exemplar['idEditora'];
        $area = $exemplar['area'];
        $data = date("Y/m/d H:i:s");
        $arquivo = $_FILES['arquivo']['name'];  
        $extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));
        $novo_nome = md5(time()).".".$extensao;
        $diretorio = "../../../Public/Imagens/Exemplares/";   
        if(move_uploaded_file($_FILES['arquivo'] ['tmp_name'], $diretorio.$novo_nome))
        {
        $sql = "UPDATE tb_exemplar set titulo = :titulo, deposito = :deposito, anoPub = :anoPub, isbn = :isbn, localPub = :localPub, edicao = :edicao, 
        medida = :medida, idCategoria = :idCategoria, idEditora = :idEditora, area = :area, foto = :foto, dataAlteracao = :dataAlteracao where codExemplar = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':titulo'=>$titulo,':deposito'=>$deposito,':anoPub'=>$anoPub,':isbn'=>$isbn,'localPub'=>$local,':edicao'=>$edicao,':medida'=>$medida,':idCategoria'=>$idCategoria,':idEditora'=>$idEditora,':area'=>$area,':foto'=>$novo_nome, ':dataAlteracao'=>$data, ':codigo'=>$codigo]);    
        }else
        {
        $sql = "UPDATE tb_exemplar set titulo = :titulo, deposito = :deposito, anoPub = :anoPub, isbn = :isbn, localPub = :localPub, edicao = :edicao, 
        medida = :medida, idCategoria = :idCategoria, idEditora = :idEditora, area = :area, dataAlteracao = :dataAlteracao where codExemplar = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':titulo'=>$titulo,':deposito'=>$deposito,':anoPub'=>$anoPub,':isbn'=>$isbn,'localPub'=>$local,':edicao'=>$edicao,':medida'=>$medida,':idCategoria'=>$idCategoria,':idEditora'=>$idEditora,':area'=>$area,':dataAlteracao'=>$data, ':codigo'=>$codigo]);    
        }
    }

    public function remover($codigo) {
        $sql = "UPDATE tb_exemplar SET dataRemocao = :dataRemocao where codExemplar = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $data = date('Y/m/d h:i:s');
        $stmt->execute([':dataRemocao'=>$data,':codigo'=>$codigo]);    
    }

    public function buscarCategorias()
    {
        $sql = "SELECT *from tb_categoria";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarPorId($id)
    {
        $sql = "SELECT E.codExemplar, E.titulo, E.deposito, E.anoPub, E.foto, E.isbn, E.localPub, E.edicao, E.medida, 
        C.descricao as categoria, Ed.nome as editora, E.area from tb_exemplar as E inner join tb_categoria as C on C.codCategoria = E.idCategoria
        inner join tb_editora as Ed on Ed.codEditora = E.idCategoria where E.dataRegisto = E.dataRemocao and E.codExemplar = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':codigo'=>$id]); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // retornar na forma de uma array associativo, todos os autores do banco.
    }

    public function buscarAreas()
    {
        $sql = "SELECT *from tb_area";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function pesquisar($argumentos)
    {
        $arg = $argumentos['arg'];
        $sql = "SELECT E.codExemplar, E.titulo, E.deposito, E.anoPub, E.isbn, E.localPub, E.edicao, E.medida, 
        C.descricao as categoria, Ed.nome as editora, E.area, E.foto from tb_exemplar as E inner join tb_categoria as C on C.codCategoria = E.idCategoria
        inner join tb_editora as Ed on Ed.codEditora = E.idCategoria where E.titulo like '$arg%' ";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); // execução do comando SQL
        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>