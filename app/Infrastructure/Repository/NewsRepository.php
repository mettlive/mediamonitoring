<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\NewsPage;
use App\Domain\Repository\NewsRepositoryInterface;
use App\Domain\ValueObject\Title;
use App\Domain\ValueObject\URL;
use App\Infrastructure\Models\News;

class NewsRepository implements NewsRepositoryInterface
{


    public function __construct(
        protected News $newsModel
    )
    {
    }

    public function save(NewsPage $newsPage): NewsPage
    {
        $id = $this->newsModel->create([
            'url' => $newsPage->getURL()->getValue(),
            'title' => $newsPage->getTitle()->getValue(),
            'date' => $newsPage->getDate() //
        ]);
        $newsPage->setId($id);
        return $newsPage;
    }

    public function getAll(): array
    {
        $news = [];
        foreach ($this->newsModel->all() as $newsPage) {
            $news[] = new NewsPage($newsPage['date'], new Title($newsPage['title']), new URL($newsPage['url']));
        }
        return $news;
    }

    public function getByID(int $id): NewsPage
    {
        $newsPage = $this->newsModel->findOrFail($id);
        return new NewsPage($newsPage['date'], new Title($newsPage['title']), new URL($newsPage['url']));
    }
}
