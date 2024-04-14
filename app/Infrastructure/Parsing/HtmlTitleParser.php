<?php

namespace App\Infrastructure\Parsing;

use Symfony\Component\DomCrawler\Crawler;

class HtmlTitleParser implements TitleParserInterface
{

    public function parseFromHtml(string $html): string
    {
        return (new Crawler($html))->filter('title')->text();
    }
}
