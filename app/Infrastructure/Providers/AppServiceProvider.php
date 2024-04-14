<?php

namespace App\Infrastructure\Providers;

use App\Domain\Repository\FileRepositoryInterface;
use App\Domain\Repository\NewsRepositoryInterface;
use App\Infrastructure\Parsing\HTMLPageDownloader;
use App\Infrastructure\Parsing\HTMLPageDownloaderInterface;
use App\Infrastructure\Parsing\HtmlTitleParser;
use App\Infrastructure\Parsing\TitleParserInterface;
use App\Infrastructure\Repository\FileRepository;
use App\Infrastructure\Repository\NewsRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(HTMLPageDownloaderInterface::class, HTMLPageDownloader::class);
        $this->app->bind(NewsRepositoryInterface::class, NewsRepository::class);
        $this->app->bind(TitleParserInterface::class, HtmlTitleParser::class);
        $this->app->bind(FileRepositoryInterface::class, FileRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
