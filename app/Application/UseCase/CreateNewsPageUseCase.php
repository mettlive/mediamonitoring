<?php

namespace App\Application\UseCase;

use App\Application\UseCase\Request\CreateNewsPageRequest;
use App\Application\UseCase\Response\CreateNewsPageResponse;
use App\Domain\Entity\NewsPage;
use App\Domain\Repository\NewsRepositoryInterface;
use App\Domain\ValueObject\Title;
use App\Domain\ValueObject\URL;
use App\Infrastructure\Parsing\HTMLPageDownloaderInterface;
use App\Infrastructure\Parsing\TitleParserInterface;

class CreateNewsPageUseCase
{
    private NewsRepositoryInterface $repository;
    private TitleParserInterface $parser;
    private HTMLPageDownloaderInterface $downloader;
    public function __construct(
        NewsRepositoryInterface $repository,
        HTMLPageDownloaderInterface $downloader,
        TitleParserInterface $parser
    )
    {
        $this->repository = $repository;
        $this->$parser = $parser;
        $this->downloader = $downloader;
    }

    public function __invoke(CreateNewsPageRequest $request): CreateNewsPageResponse
    {
        $url = new URL($request->url);
        $html = $this->downloader->download($url->getValue());
        $title = new Title($this->parser->parseFromHtml($html));
        $currentTime = date('Y-m-d H:i:s');

        $newsPage = new NewsPage($currentTime, $title, $url);

        $this->repository->save($newsPage);

        return new CreateNewsPageResponse($newsPage->getId());
    }

}
