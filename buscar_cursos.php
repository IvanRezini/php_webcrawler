<?php
//Inclui as classes a medida que sao necessariass
require 'vendor/autoload.php';

use SENAI\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;


$client = new Client(['base_uri' => 'https://www.sc.senai.br']);
$crawler = new Crawler();
$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos/curso-tecnico');


foreach ($cursos as $curso) {
    echo $curso . PHP_EOL;
}