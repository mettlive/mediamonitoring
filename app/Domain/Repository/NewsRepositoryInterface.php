<?php

namespace App\Domain\Repository;

use App\Domain\Entity\NewsPage;

interface NewsRepositoryInterface
{
    public function save(NewsPage $newsPage);
    public function getAll(): array;
}
