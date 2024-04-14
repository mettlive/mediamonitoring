<?php

namespace App\Application\UseCase\Response;

class PresenterCreateReportResponse
{

    public function __construct(
        public readonly string $reportName,
        public readonly string $reportContent
    )
    {
    }
}
