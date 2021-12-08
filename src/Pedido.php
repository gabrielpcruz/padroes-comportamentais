<?php

namespace Alura\DesignPattern;

use DateTimeInterface;

class Pedido
{
    public string $nomeCliente;
    public DateTimeInterface $dataFinalizacao;
    public Orcamento $orcamento;
}