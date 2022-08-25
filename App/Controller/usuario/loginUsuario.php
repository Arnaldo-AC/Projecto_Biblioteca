<?php
//criação da namespace para inserir os fornecedores
namespace App\Controller\usuario;
//inclusão do arquivo fornecedor da Model
use App\Model\usuario;

class loginUsuario{
    private $loginStatus;
    private $nome;
    private $id;
    private $foto;
    private $nivel;
    private $erroLogin = 0;

    public function __construct(){
        $this->setLoginStatus(false);
    }

    public function getLoginStatus(){
        return $this->loginStatus;
    }
    private function setLoginStatus($status){
        $this->loginStatus = $status;
    }

    public function getNome(){
        return $this->nome;
    }
    private function setNome($nome){
        $this->nome = $nome;
    }

    public function getId(){
        return $this->id;
    }
    private function setId($id){
        $this->id = $id;
    }

    public function getFoto(){
        return $this->foto;
    }
    private function setFoto($foto){
        $this->foto = $foto;
    }

    public function getNivel(){
        return $this->nivel;
    }
    private function setNivel($nivel){
        $this->nivel = $nivel;
    }
   
    public function autenticar(){
        session_start();
        unset($_SESSION['loginStatusUsuario']);
        try{
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $usuario = [
                'email'=> $_REQUEST['email'],
                'senha'=> $_REQUEST['senha']
            ];
            $user = new usuario();
            $usuarios = $user->logar();

            foreach ($usuarios as $users) {
                if($users['email']==$usuario['email'] && $users['senha']==md5($usuario['senha'])){
                    $this->setLoginStatus(true);
                    $this->setNome($users['nome']);
                    $this->setId($users['codUsuario']);
                    $this->setFoto($users['foto']);
                    $this->setNivel($users['nivel']);
                    session_start();
                    $_SESSION['loginStatusUsuario'] = $this->getLoginStatus();
                    $_SESSION['nomeUsuario'] = $this->getNome();
                    $_SESSION['idUsuario'] = $this->getId();
                    $_SESSION['nivelUsuario'] = $this->getNivel();
                    $_SESSION['fotoUsuario'] = $this->getFoto();
                    $_SESSION['erroLogin'] = 0;
                    header('Location: ../view/index-logado.php');
                }
                else{
                    $this->erroLogin += 1;
                    $_SESSION['erroLoginUser'] = $this->erroLogin; 
                }
            }
             }
            
            }
            catch(PDOException $erro)
            {
                echo $erro->getMessage();
            }
            
        }
    }
?>