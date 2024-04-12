<?php

namespace App\Application\UseCase;

use App\Application\Factory\NewsPageFactory;
use App\Application\UseCase\Request\CreateNewsPageRequest;
use App\Application\UseCase\Response\CreateNewsPageResponse;
use App\Domain\Downloader\HTMLPageDownloaderInterface;
use App\Domain\Parser\TitleParserInterface;
use App\Domain\Repository\NewsRepositoryInterface;

class CreateNewsPageUseCase
{
    private NewsRepositoryInterface $repository;
    private NewsPageFactory $newsPageFactory;
    public function __construct(
        NewsRepositoryInterface $repository,
        HTMLPageDownloaderInterface $downloader,
        TitleParserInterface $parser
    )
    {
        $this->repository = $repository;
        $this->newsPageFactory = new NewsPageFactory($downloader, $parser);
    }

    public function __invoke(CreateNewsPageRequest $request): CreateNewsPageResponse
    {
        $newsPage = $this->newsPageFactory->create($request->url);
        $id = $this->repository->save($newsPage);

        return new CreateNewsPageResponse($id);
    }

}
