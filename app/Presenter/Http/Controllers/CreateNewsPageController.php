<?php
namespace App\Presenter\Http\Controllers;
use App\Application\UseCase\CreateNewsPageUseCase;
use App\Application\UseCase\Request\CreateNewsPageRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CreateNewsPageController
{
    public function __construct(
        private CreateNewsPageUseCase $useCase
    ) {
    }

    public function __invoke(Request $request)
    {
        try {
            $url = $request->input('url');
            $createNewsPageRequest = new CreateNewsPageRequest($url);
            $response = ($this->useCase)($createNewsPageRequest);
            return view('news', ['response' => $response->id]);
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
