<?php

namespace App\Application\UseCase;

use App\Application\Factory\ReportFactory;
use App\Application\UseCase\Request\CreateReportRequest;
use App\Application\UseCase\Response\CreateReportResponse;
use App\Domain\Entity\NewsCollection;
use App\Domain\Entity\NewsPage;
use App\Domain\Repository\FileRepositoryInterface;
use App\Domain\Repository\NewsRepositoryInterface;
use App\Domain\ValueObject\Title;
use App\Domain\ValueObject\URL;

class CreateReportUseCase
{
    private NewsRepositoryInterface $repository;
    private FileRepositoryInterface $fileRepository;

    public function __construct(NewsRepositoryInterface $repository, FileRepositoryInterface $fileRepository)
    {
        $this->repository = $repository;
        $this->fileRepository = $fileRepository;
    }

    public function __invoke(CreateReportRequest $request): CreateReportResponse
    {
        $news_collection = new NewsCollection();
        foreach ($request->ids as $id) {
            $news_info = $this->repository->getById($id);
            $news_collection->addNews(new NewsPage($news_info['date'], new Title($news_info['title']), new URL($news_info['url'])));
        }
        $report = ReportFactory::create($news_collection);

        $link = $this->fileRepository->save($report->getValue());

        return new CreateReportResponse($link);

    }

}
