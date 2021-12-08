<?php

use Alura\DesignPattern\CalculadoraDeDescontos;
use Alura\DesignPattern\Orcamento;
use PHPUnit\Framework\TestCase;

class CalculadoraDeDecontosTest extends TestCase
{
    public function testDeveAplicarDescontoDeZeroReaisPoisHa5ItensEOValorEhMenorQue500Reais()
    {
        $orcamento = new Orcamento();
        $orcamento->valor = 400;
        $orcamento->quantidadeItens = 5;

        $calculadoraDeDescontos = new CalculadoraDeDescontos();
        $desconto = $calculadoraDeDescontos->calculaDescontos($orcamento);

        $this->assertEquals(0, $desconto);
        $this->assertInternalType('float', $desconto);
    }

    public function testDeveAplicarDescontoDeZeroReaisPoisHa5ItensEOValorEh500Reais()
    {
        $orcamento = new Orcamento();
        $orcamento->valor = 500;
        $orcamento->quantidadeItens = 4;

        $calculadoraDeDescontos = new CalculadoraDeDescontos();
        $desconto = $calculadoraDeDescontos->calculaDescontos($orcamento);

        $this->assertEquals(0, $desconto);
        $this->assertInternalType('float', $desconto);
    }

    public function testDeveAplicarDescontoDeDezPorCentoPoisHaMaisDe5()
    {
        $orcamento = new Orcamento();
        $orcamento->valor = 501;
        $orcamento->quantidadeItens = 6;

        $calculadoraDeDescontos = new CalculadoraDeDescontos();
        $desconto = $calculadoraDeDescontos->calculaDescontos($orcamento);

        $this->assertEquals(50.1, $desconto);
        $this->assertInternalType('float', $desconto);
    }

    public function testDeveAplicarDescontoDe5PorCentoPoisoValorEhMaiorQue500Reais()
    {
        $orcamento = new Orcamento();
        $orcamento->valor = 501;
        $orcamento->quantidadeItens = 5;

        $calculadoraDeDescontos = new CalculadoraDeDescontos();
        $desconto = $calculadoraDeDescontos->calculaDescontos($orcamento);

        $this->assertEquals(25.05, $desconto);
        $this->assertInternalType('float', $desconto);
    }
}