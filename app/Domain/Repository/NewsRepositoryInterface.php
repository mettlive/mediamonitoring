<?php

namespace App\Domain\Repository;

use App\Domain\Entity\NewsPage;

interface NewsRepositoryInterface
{
    public function save(NewsPage $newsPage): NewsPage;

    /**
     * Возвращает массив объектов типа NewsPage.
     *
     * @return NewsPage[] Массив объектов новостных страниц.
     */
    public function getAll(): array;

    /**
     * Возвращает объект NewsPage.
     *
     * @return NewsPage новостная страница.
     */
    public function getByID(int $id): NewsPage;
}
