<?php

namespace SENAI\BuscadorDeCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    private $httpCliente;
    private $crawler;
    public function __construct(ClientInterface $httpCliente, Crawler $crawler)
    {
        $this->httpCliente = $httpCliente;
        $this->crawler = $crawler;
    }
    public function buscar(string $url): array
    {
        $response = $this->httpCliente->request('GET', $url);
        $html = $response->getBody();
        $this->crawler->addHtmlContent($html);
        $elementosCursos = $this->crawler->filter("div.card-detalhes__main-info > p");
        $cursos = [];
        foreach ($elementosCursos as $elemento) {
            $cursos[] = $elemento->textContent;
        }
        return $cursos;
    }
}
