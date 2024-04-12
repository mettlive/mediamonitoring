<?php

namespace App\Application\UseCase\Response;

class CreateReportResponse
{

    public function __construct(
        public readonly string $link
    )
    {
    }
}
