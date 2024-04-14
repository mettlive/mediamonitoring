<?php

namespace App\Application\Actions;

use App\Application\UseCase\Request\PresenterCreateReportRequest;
use App\Application\UseCase\Response\PresenterCreateReportResponse;
use App\Domain\Presenter\PresenterInterface;

class ReportCreator implements PresenterInterface
{

    public static function createReport(PresenterCreateReportRequest $request): PresenterCreateReportResponse
    {
        $html = "<ul>";
        foreach ($request->news as $newsPage) {
            $url = $newsPage->getURL()->getValue();
            $title = $newsPage->getTitle()->getValue();
            $html .= "<li><a href=$url>$title</a>";
        }
        $html .= "</ul>";
        $currentTime = date('Y-m-d H:i:s');
        $reportName = "Report_" . $currentTime;

        return new PresenterCreateReportResponse($reportName, $html);
    }
}
