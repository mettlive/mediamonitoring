<?php

namespace App\Application\UseCase\Request;

class PresenterCreateReportRequest
{

    public function __construct(
        public readonly array $news
    )
    {
    }
}
