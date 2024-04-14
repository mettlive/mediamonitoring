<?php

namespace App\Infrastructure\Repository;

use App\Domain\Repository\FileRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class FileRepository implements FileRepositoryInterface
{

    public function save(string $filename, string $content): string
    {
        Storage::disk('local')->put($filename, $content);

        return Storage::disk('local')->url($filename);
    }
}
