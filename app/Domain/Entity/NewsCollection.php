<?php

namespace App\Domain\Entity;

class NewsCollection
{
    private array $collection;

    public function addNews(NewsPage $newsPage) {
        $this->collection[] = $newsPage;
    }

    /**
     * @return array
     */
    public function getCollection(): array
    {
        return $this->collection;
    }


}
