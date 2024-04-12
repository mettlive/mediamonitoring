<?php

namespace App\Application\UseCase\Request;

class CreateReportRequest
{

    public function __construct(
        public readonly array $ids
    )
    {
    }
}
