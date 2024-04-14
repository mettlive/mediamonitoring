<?php

namespace App\Domain\Presenter;

use App\Application\UseCase\Request\PresenterCreateReportRequest;
use App\Application\UseCase\Response\PresenterCreateReportResponse;

interface PresenterInterface
{
    public static function createReport(PresenterCreateReportRequest $request): PresenterCreateReportResponse;
}
