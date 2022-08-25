<?php
//criação da namespace para inserir os fornecedores
namespace App\Controller\usuario;
//inclusão do arquivo fornecedor da Model
use App\Model\usuario;

class recuperar{
    private $loginStatus;
    private $nome;
    private $id;
    private $foto;
    private $nivel;

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
   
    public function verificar(){

        try
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['codigo']))
        {
            $usuario = [
                'email'=> $_REQUEST['email'],
                'senha'=> md5($_REQUEST['senha']),
                'codigo'=>$_REQUEST['codigo'],
                'senha1'=>md5($_REQUEST['senha1'])
            ];
            $mod = new usuario();
            $usuarios = $mod->listar();
            $cod = $mod->buscarCodigo($usuario['email']);

            if($usuario['senha'] == $usuario['senha1'])
            {
                foreach($usuarios as $users) {
                    if($users['email']==$usuario['email'] && $usuario['codigo'] == $cod){
                        $mod->recuperar($usuario);
                        header('Location: ../view/loginUsuario.php');
                    }
                }
            }
            else
            {
                ?>
                <script>
                    alert('Dados incorrectos');
                </script>
                <?php
                header('Location: ../view/nova_senha.php');
            }
        }
    }
        catch(Exception $erro)
        {
            
        }     
       
    }
}
?>