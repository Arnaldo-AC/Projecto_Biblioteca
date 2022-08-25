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
   
    public function recuperar($senha){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $funcionario = [
                'email'=> $_REQUEST['email']
            ];
            $mod = new funcionario();
            $funcionarios = $mod->listar();

            foreach ($funcionarios as $users) {
                if($users['email']==$funcionario['email']){
                    $func = new funcionario();
                    $senha = substr(md5(time()),0,6);
                    $nscriptografada = md5(md5($senha));
                    $func->recuperar($funcionario, $nscriptografada);
                    header('Location: ../view/loginUsuario.php');
                }
            }
        }
    }
}
?>