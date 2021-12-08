<?php

use Alura\DesignPattern\CalculadoraDeImpostos;
use Alura\DesignPattern\Impostos\Icms;
use Alura\DesignPattern\Impostos\Icpp;
use Alura\DesignPattern\Impostos\Ikcv;
use Alura\DesignPattern\Impostos\Iss;
use Alura\DesignPattern\Orcamento;
use PHPUnit\Framework\TestCase;

class CalculadoraDeImpostosTest extends TestCase
{
    public function testCalculaIcms()
    {
        $orcamento = new Orcamento();
        $orcamento->valor = 250;

        $calculadoraDeImpostos = new CalculadoraDeImpostos();
        $imposto = $calculadoraDeImpostos->calcula($orcamento, new Icms());

        $this->assertEquals(25, $imposto);
        $this->assertInternalType('float', $imposto);
    }

    public function testCalculaIss()
    {
        $orcamento = new Orcamento();
        $orcamento->valor = 250;

        $calculadoraDeImpostos = new CalculadoraDeImpostos();
        $imposto = $calculadoraDeImpostos->calcula($orcamento, new Iss());

        $this->assertEquals(15, $imposto);
        $this->assertInternalType('float', $imposto);
    }

    public function testDeveAplicarAliquotaMaiorDoImpostoIcppPoisOValorEhMaiorQue500Reais()
    {
        $orcamento = new Orcamento();
        $orcamento->valor = 500.01;

        $calculadoraDeImpostos = new CalculadoraDeImpostos();
        $imposto = $calculadoraDeImpostos->calcula($orcamento, new Icpp());

        $this->assertEquals(15.0003, $imposto);
        $this->assertInternalType('float', $imposto);
    }

    public function testDeveAplicarAliquotaMenorDoImpostoIcppPoisOValorEhMenorQue500Reais()
    {
        $orcamento = new Orcamento();
        $orcamento->valor = 499.99;

        $calculadoraDeImpostos = new CalculadoraDeImpostos();
        $imposto = $calculadoraDeImpostos->calcula($orcamento, new Icpp());

        $this->assertEquals(9.9998, $imposto);
        $this->assertInternalType('float', $imposto);
    }

    public function testDeveAplicarAliquotaMaiorDoImpostoIkcvPoisOValorEhMaiorQue300ReaisEAQuantidadeEhMaiorQue3Itens()
    {
        $orcamento = new Orcamento();
        $orcamento->valor = 300.01;
        $orcamento->quantidadeItens = 4;

        $calculadoraDeImpostos = new CalculadoraDeImpostos();
        $imposto = $calculadoraDeImpostos->calcula($orcamento, new Ikcv());

        $this->assertEquals(12.0004, $imposto);
        $this->assertInternalType('float', $imposto);
    }

    public function testDeveAplicarAliquotaMenorDoImpostoIkcvPoisOValorEhMaiorQue300ReaisMasAQuantidadeEhMenorQue3Itens()
    {
        $orcamento = new Orcamento();
        $orcamento->valor = 300.01;
        $orcamento->quantidadeItens = 3;

        $calculadoraDeImpostos = new CalculadoraDeImpostos();
        $imposto = $calculadoraDeImpostos->calcula($orcamento, new Ikcv());

        $this->assertEquals(7.50025, $imposto);
        $this->assertInternalType('float', $imposto);
    }
}