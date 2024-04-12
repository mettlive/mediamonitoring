<?php

namespace App\Application\Factory;

use App\Domain\Entity\NewsCollection;
use App\Domain\Entity\Report;
use App\Domain\ValueObject\File;

class ReportFactory
{

    public static function create(NewsCollection $news): Report
    {
        $html = "<ul>";
        foreach ($news->getCollection() as $newsPage) {
            $url = $newsPage->getURL()->getValue();
            $title = $newsPage->getTitle()->getValue();
            $html .= "<li><a href=$url>$title</a>";
        }
        $html .= "</ul>";
        $currentTime = date('Y-m-d H:i:s');
        $content = new File("Report_" . $currentTime,$html);
        return new Report($content);
    }
}
