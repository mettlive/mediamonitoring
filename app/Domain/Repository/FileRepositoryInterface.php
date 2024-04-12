<?php

namespace App\Domain\Repository;

use App\Domain\ValueObject\File;

interface FileRepositoryInterface
{
    public function save(File $file);
}
