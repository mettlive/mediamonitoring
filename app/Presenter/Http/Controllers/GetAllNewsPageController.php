<?php

namespace App\Presenter\Http\Controllers;

use App\Application\UseCase\GetAllNewsPageUseCase;

class GetAllNewsPageController
{
    private GetAllNewsPageUseCase $useCase;

    /**
     * @param GetAllNewsPageUseCase $useCase
     */
    public function __construct(GetAllNewsPageUseCase $useCase)
    {
        $this->useCase = $useCase;
    }


    public function __invoke()
    {
        try {
            $response = ($this->useCase)();
            return view('news_list', ['entities' => $response->news]);
        } catch (\Exception $e) {
            dd($e);
        }

    }

}
