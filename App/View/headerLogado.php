<?php

require_once '../../src/vendor/autoload.php';
use App\Controller\exemplar\read;
use App\Controller\carrinho\insert;

$qtd = strlen($_SESSION['nomeUsuario']);
$c = 0;
for($i = 0; $i < $qtd; $i++)
{
    if(substr($_SESSION['nomeUsuario'],$qtd-$i,1) == " ")
    {
        $c = $qtd-$i;
        break;
    }
}
$nome = substr($_SESSION['nomeUsuario'],0,1);
$sobrenome = strtoupper(substr($_SESSION['nomeUsuario'],$c+1,1));
$apelido = $nome. '.'.$sobrenome;
?>
   <header class="cabecalho">
    <div class="dentro-cliente">
        <div class="logo">
            <a href="index-logado.php">
            <img src="img/logo-p.png" alt="logo">
            </a>
        </div>
        <nav class="links-nav">
            <ul>
                <li>
                    <a href="index-logado.php">
                    <span class="destaque">&lt;</span> Inicio <span class="destaque">&gt;</span>
                    </a>
                </li>
                <li>    
                    <a href="produtoscliente.php">
                      Exemplares
                    </a>
                </li>
                <li>
                    <a href="sobre.php">
                     Sobre
                    </a>
                </li>
            </ul>
        </nav>
        <aside class="aside-cliente">
        <div class="bloco-pesquisa">
            <form method="post" action="produtos-pesquisa.php">
            <input type="search" name="arg" class="box-search" placeholder="Pesquisar..."/>
            <img class="lupa" src="img/icon-lupa.png" alt="">
            </form>
        </div>
        <div class="periferico">
    
            <a href="carrinho.php"> 
                <img src="img/carrinho.png" alt="">
            </a>    
            <span class="separador-vertical"></span>
            <div class="logar-dif">
                <div class="box-1">
                    <div class="box-foto">
                        <img src="../../Public/Imagens/Usuarios/<?=$_SESSION['fotoUsuario']?>" alt="" class="foto-us">
                    </div>
                    <span>
                       <?=$apelido?>
                    </span>
                </div>
                <div class="mais-opcoes">
                    <div class="dropdown show">
                        <button class="btn-drop btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">  
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li class="box-inf-us">
                                <div class="box-foto-2">
                                    <img src="../../Public/Imagens/Usuarios/<?=$_SESSION['fotoUsuario']?>" alt="" class="foto-us" style="width:100%; heigth:100%;">
                                </div>
                                <span id="nome-us">
                                <?=$_SESSION['nomeUsuario'] ?>
                                </span>
                                <a href="" class="btn-editar-us">
                                    Editar
                                </a>      
                            </li>
                            <li class="item-lista-us">
                                <a class="dropdown-item desc-logout" href="bibliotecaUsuario.php">
                                    <img src="img/icon-biblioteca.png" alt=""> <div class="texto-s">Minha Biblioteca</div>  
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item desc-logout" href="loginUsuario.php">
                                    <img src="img/log-out.png" alt=""> <div class="texto-s">Terminar sessão</div>
                                </a>
                            </li>
                        </ul>
                      </div>
                </div>
            </div>
    
        </div>
    </aside>
    </div>
</header>
