<?php

namespace App\Domain\Parser;

interface TitleParserInterface
{
    public function parseFromHtml(string $html): string;
}
