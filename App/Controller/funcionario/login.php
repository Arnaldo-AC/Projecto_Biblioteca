<?php
//criação da namespace para inserir os fornecedores
namespace App\Controller\funcionario;
//inclusão do arquivo fornecedor da Model
use App\Model\funcionario;

class login{
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
      //  session_start();
        unset($_SESSION['loginStatus']);
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $funcionario = [
                'email'=> $_REQUEST['email'],
                'senha'=> $_REQUEST['senha']
            ];
            $user = new funcionario();
            $funcionarios = $user->logar();

            foreach ($funcionarios as $users) {
                if($users['email']==$funcionario['email'] && ($users['senha'])==md5($funcionario['senha'])){
                    $this->setLoginStatus(true);
                    $this->setNome($users['nome']);
                    $this->setId($users['codFuncionario']);
                    $this->setFoto($users['foto']);
                    $this->setNivel($users['nivel']);
                    session_start();
                    $_SESSION['loginStatus'] = $this->getLoginStatus();
                    $_SESSION['nome'] = $this->getNome();
                    $_SESSION['idFuncionario'] = intval($this->getId());
                    $_SESSION['nivel'] = $this->getNivel();
                    $_SESSION['foto'] = $this->getFoto();
                    $_SESSION['erroLogin'] = 0;
                    header('Location: ../view/dashboard.php');
                }
                else{
                    $this->erroLogin += 1;
                    $_SESSION['erroLogin'] = $this->erroLogin; 
                }
            }
        }
    }
}
?>