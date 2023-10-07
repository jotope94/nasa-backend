<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Services\FireBaseService;
use Exception;

class FireController extends Controller
{
    /**
     * @var \App\Services\FireBaseService
     */
    private $fireBaseService;

    /**
     * @param \App\Services\FireBaseService $fireBaseService
     */
    public function __construct(FireBaseService $fireBaseService)
    {
        $this->fireBaseService = $fireBaseService;
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function createRegister(Request $request)
    {
        try{
            $data = [
                'long'     => $request->get('lng'),
                'lat'      => $request->get('lat'),
                'report'   => $request->get('reportBy'),
                'severit'  => $request->get('fireSeverity'),
                'risk'     => $request->get('riskInNeighbourhood')
            ];
            
            $this->fireBaseService->create($data);
            return Response::json('sucesso',200);
        } catch (Exception $error) {
            return Response::json($error->getMessage(),400);
        }
    }

    public function getRegister()
    {
        try{
            return Response::json($this->fireBaseService->get());
        } catch (Exception $error) {
            return Response::json($error->getMessage(),400);
        }
    }
}


