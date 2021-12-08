<?php

namespace Alura\DesignPattern;

use DateTimeImmutable;

class GerarPedido
{
    private float $valorOrcamento;
    private int $numeroItens;
    private string $nomeCliente;

    public function __construct(
        float $valorOrcamento,
        int $numeroItens,
        string $nomeCliente
    ) {
        $this->valorOrcamento = $valorOrcamento;
        $this->numeroItens = $numeroItens;
        $this->nomeCliente = $nomeCliente;
    }

    /**
     * @return string
     */
    public function getNomeCliente(): string
    {
        return $this->nomeCliente;
    }

    /**
     * @return float
     */
    public function getValorOrcamento(): float
    {
        return $this->valorOrcamento;
    }

    /**
     * @return int
     */
    public function getNumeroItens(): int
    {
        return $this->numeroItens;
    }
}