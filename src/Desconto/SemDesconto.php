<?php

namespace Alura\DesignPattern\Desconto;

use Alura\DesignPattern\Orcamento;

class SemDesconto extends Desconto
{
    public function calculaDesconto(Orcamento $orcamento): float
    {
        return 0;
    }
}