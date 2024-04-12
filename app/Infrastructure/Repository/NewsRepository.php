<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\NewsPage;
use App\Domain\Repository\NewsRepositoryInterface;
use App\Infrastructure\Models\News;

class NewsRepository implements NewsRepositoryInterface
{


    public function __construct(
        protected News $newsModel
    )
    {
    }

    public function save(NewsPage $newsPage)
    {
        $news = $this->newsModel->create([
            'url' => $newsPage->getURL()->getValue(),
            'title' => $newsPage->getTitle()->getValue(),
            'date' => $newsPage->getDate() //
        ]);

        return $news->id;
    }

    public function getAll(): array
    {
        return $this->newsModel->all()->toArray();
    }

    public function getById(int $id)
    {
        return $this->newsModel->findOrFail($id);
    }
}
