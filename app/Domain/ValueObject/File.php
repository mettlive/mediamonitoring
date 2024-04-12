<?php

namespace App\Domain\ValueObject;

class File
{
    private string $content;
    private string $filename;

    public function __construct(
        string $filename,
        string $content

    )
    {
        $this->content = $content;
        $this->filename = $filename;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): void
    {
        $this->filename = $filename;
    }


}
