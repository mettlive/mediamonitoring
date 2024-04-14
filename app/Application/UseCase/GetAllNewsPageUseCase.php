<?php

namespace App\Application\UseCase;

use App\Application\UseCase\Response\GetAllNewsPageResponse;
use App\Domain\Repository\NewsRepositoryInterface;

class GetAllNewsPageUseCase
{
    private NewsRepositoryInterface $repository;

    public function __construct(
        NewsRepositoryInterface $repository
    )
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {
        $newsPages = $this->repository->getAll();
        $response = [];
        foreach ($newsPages as $newsPage) {
            $response[] = [
                'id' => $newsPage->getId(),
                'date' => $newsPage->getDate(),
                'title' => $newsPage->getTitle()->getValue(),
                'url' => $newsPage->getURL()->getValue()
            ];
        }
        return new GetAllNewsPageResponse($response);
    }


}
