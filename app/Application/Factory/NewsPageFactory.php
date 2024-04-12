<?php

namespace App\Application\Factory;

use App\Domain\Downloader\HTMLPageDownloaderInterface;
use App\Domain\Entity\NewsPage;
use App\Domain\Parser\TitleParserInterface;
use App\Domain\ValueObject\Title;
use App\Domain\ValueObject\URL;

class NewsPageFactory
{
    private HTMLPageDownloaderInterface $downloader;
    private TitleParserInterface $parser;

    /**
     * @param HTMLPageDownloaderInterface $downloader
     * @param TitleParserInterface $parser
     */
    public function __construct(HTMLPageDownloaderInterface $downloader, TitleParserInterface $parser)
    {
        $this->downloader = $downloader;
        $this->parser = $parser;
    }


    public function create(string $url)
    {
            $urlObj = new URL($url);
            $currentTime = date('Y-m-d H:i:s');
            $title = new Title($this->parseTitle($urlObj->getValue()));
            return new NewsPage($currentTime, $title, $urlObj);
    }

    protected function parseTitle($url): string
    {
            $html = $this->downloader->download($url);
            return $this->parser->parseFromHtml($html);
    }

}
