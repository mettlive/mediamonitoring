<?php

namespace App\Infrastructure\Parsing;

use App\Domain\Downloader\HTMLPageDownloaderInterface;
use Illuminate\Http\Client\ConnectionException;

class HTMLPageDownloader implements HTMLPageDownloaderInterface
{

    public function download(string $url): string
    {
        $htmlContent = file_get_contents($url);


        if (!$htmlContent) {
            throw new ConnectionException("Ошибка скачивания HTML контента");
        }

        return $htmlContent;
    }
}
