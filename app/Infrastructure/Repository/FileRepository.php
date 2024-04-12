<?php

namespace App\Infrastructure\Repository;

use App\Domain\Repository\FileRepositoryInterface;
use App\Domain\ValueObject\File;
use Illuminate\Support\Facades\Storage;

class FileRepository implements FileRepositoryInterface
{

    public function save(File $file): string
    {
        Storage::disk('local')->put($file->getFilename(), $file->getContent());

        return Storage::disk('local')->url($file->getFilename());
    }
}
