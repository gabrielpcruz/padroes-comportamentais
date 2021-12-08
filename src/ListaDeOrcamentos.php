<?php

namespace Alura\DesignPattern;

use ArrayIterator;

class ListaDeOrcamentos implements \IteratorAggregate
{
    /**
     * @var Orcamento[]
     */
    private array $orcamentos;

    public function __construct()
    {
        $this->orcamentos = [];
    }

    /**
     * @param Orcamento $orcamentos
     */
    public function addOrcamento(Orcamento $orcamentos): void
    {
        $this->orcamentos[] = $orcamentos;
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->orcamentos);
    }
}