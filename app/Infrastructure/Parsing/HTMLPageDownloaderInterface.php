<?php

namespace App\Infrastructure\Parsing;

interface HTMLPageDownloaderInterface
{
    public function download(string $url): string;
}
