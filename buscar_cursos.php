<?php
//Inclui as classes a medida que sao necessariass
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new \GuzzleHttp\Client();
$response = $client->request('GET', 'https://www.sc.senai.br/cursos/curso-tecnico');

$html = $response->getBody();
echo $response->getStatusCode();

$crawler = new Crawler();
$crawler->addHtmlContent($html);
$cursos = $crawler->filter("div.card-detalhes__main-info > p");

foreach ($cursos as $curso) {
    echo $curso->textContent . PHP_EOL;
}