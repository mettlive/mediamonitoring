<?php

namespace App\Domain\Entity;

use App\Domain\ValueObject\Title;
use App\Domain\ValueObject\URL;

class NewsPage
{
    private int $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function __construct(
        private $date,
        private Title $title,
        private URL $URL
    )
    {
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getURL(): URL
    {
        return $this->URL;
    }

    public function setURL(URL $URL): void
    {
        $this->URL = $URL;
    }

    public function getTitle(): Title
    {
        return $this->title;
    }

    public function setTitle(Title $title): void
    {
        $this->title = $title;
    }


}
