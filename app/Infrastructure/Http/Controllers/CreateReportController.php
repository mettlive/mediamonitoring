<?php

namespace App\Infrastructure\Http\Controllers;

use App\Application\UseCase\CreateReportUseCase;
use App\Application\UseCase\Request\CreateReportRequest;
use Exception;
use Illuminate\Http\Request;

class CreateReportController
{

    public function __construct(
        private CreateReportUseCase $useCase
    )
    {
    }

    public function __invoke(Request $request)
    {
        try {
            $ids = $request->input('ids');
            $createReportRequest = new CreateReportRequest($ids);
            $response = ($this->useCase)($createReportRequest);
            return view('report', ['response' => $response->link]);
        } catch (Exception $e) {
            dd($e);
        }
    }


}
