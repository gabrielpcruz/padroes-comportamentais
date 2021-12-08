<?php

namespace Alura\DesignPattern;

use Alura\DesignPattern\Desconto\DescontoMaisDe500Reais;
use Alura\DesignPattern\Desconto\DescontoMaisDe5Itens;
use Alura\DesignPattern\Desconto\SemDesconto;

class CalculadoraDeDescontos
{
    public function calculaDescontos(Orcamento $orcamento): float
    {
        $descontoMaisDeCinco = new DescontoMaisDe5Itens();
        $descontoMaisDe500Reais = new DescontoMaisDe500Reais();
        $semDesconto = new SemDesconto();

        $descontoMaisDe500Reais->setProximo($semDesconto);
        $descontoMaisDeCinco->setProximo($descontoMaisDe500Reais);

        return $descontoMaisDeCinco->calculaDesconto($orcamento);
    }
}