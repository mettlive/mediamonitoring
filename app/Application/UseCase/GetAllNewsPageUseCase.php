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
        return new GetAllNewsPageResponse($newsPages);
    }


}
