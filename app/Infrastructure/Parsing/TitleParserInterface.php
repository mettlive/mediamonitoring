<?php

namespace App\Infrastructure\Parsing;

interface TitleParserInterface
{
    public function parseFromHtml(string $html): string;
}
