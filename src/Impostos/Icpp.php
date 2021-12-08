<?php

namespace Alura\DesignPattern\Impostos;

use Alura\DesignPattern\Orcamento;

class Icpp extends ImpostoCom2Aliquotas
{
    /**
     * @param Orcamento $orcamento
     * @return bool
     */
    protected function deveAplicarTaxaMaxima(Orcamento $orcamento): bool
    {
        return $orcamento->valor > 500;
    }

    /**
     * @param Orcamento $orcamento
     * @return float
     */
    protected function calculaTaxaMaxima(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.03;
    }

    /**
     * @param Orcamento $orcamento
     * @return float
     */
    protected function calculaTaxaMinima(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.02;
    }
}