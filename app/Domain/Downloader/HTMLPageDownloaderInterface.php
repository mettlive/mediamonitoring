<?php

namespace App\Domain\Downloader;

interface HTMLPageDownloaderInterface
{
    public function download(string $url): string;
}
