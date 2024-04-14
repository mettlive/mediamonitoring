<?php

namespace App\Domain\Repository;

interface FileRepositoryInterface
{
    public function save(string $filename, string $content): string;
}
