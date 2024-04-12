<?php

namespace App\Application\UseCase\Request;

class CreateNewsPageRequest
{
    public function __construct(
        public readonly string $url
    )
    {
    }
}
