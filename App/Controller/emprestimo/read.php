<?php
namespace App\Controller\emprestimo;
use App\Model\exemplar;
use App\Model\editora;
use App\Model\emprestimo;

class read
{
    public function ler()
    {
        $mod = new emprestimo();
        $emprestimos = $mod->listar();
        return $emprestimos;
    }

    public function ler_exemplares($codigo)
    {
        $mod = new exemplar();
        $exemplares = $mod->listar_exemplares($codigo);
        return $exemplares;
    }
}