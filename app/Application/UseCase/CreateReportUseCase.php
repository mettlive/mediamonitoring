<?php

namespace App\Application\UseCase;

use App\Application\Actions\ReportCreator;
use App\Application\UseCase\Request\CreateReportRequest;
use App\Application\UseCase\Request\PresenterCreateReportRequest;
use App\Application\UseCase\Response\CreateReportResponse;
use App\Domain\Repository\FileRepositoryInterface;
use App\Domain\Repository\NewsRepositoryInterface;

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
        $news = [];

        foreach ($request->ids as $id) {
            $news[] = $this->repository->getByID($id);
        }

        $report = ReportCreator::createReport(new PresenterCreateReportRequest($news)) ;

        $link = $this->fileRepository->save($report->reportName, $report->reportContent);

        return new CreateReportResponse($link);

    }

}
