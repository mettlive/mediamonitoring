<?php

namespace App\Application\UseCase\Response;

class CreateNewsPageResponse
{

    public function __construct(
        public readonly string $id,
    )
    {
    }
}
