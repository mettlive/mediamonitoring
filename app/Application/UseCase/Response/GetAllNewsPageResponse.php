<?php

namespace App\Application\UseCase\Response;

class GetAllNewsPageResponse
{

    public function __construct(
        public readonly array $news
    )
    {
    }
}
