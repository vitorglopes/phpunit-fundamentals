<?php

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;

require 'vendor/autoload.php';

//ARRUMAR A CASA PARA O TESTE
// Arrange / Given
$leilao = new Leilao('FIAT 147 0KM');

$maria = new Usuario('Maria');
$joao = new Usuario('João');

$leilao->recebeLance(new Lance($joao, 2000));
$leilao->recebeLance(new Lance($maria, 2500));

$leiloeiro = new Avaliador();

//EXECUTAR CÓDIGO A SER TESTADO
// Act / When

$leiloeiro->avalia($leilao);

$maiorValor = $leiloeiro->getMaiorValor();

//VERIFICO SE A SAÍDA É A ESPERADA
// Assert / Then

$valorEsperado = 2500;

if ($valorEsperado == $maiorValor) 
{
    echo 'Teste OK';
} else {
    echo 'Teste Falhou';
}

//ARRANGE-ACT-ASSERT -> http://wiki.c2.com/?ArrangeActAssert
//GivenWhenThen -> https://martinfowler.com/bliki/GivenWhenThen.html