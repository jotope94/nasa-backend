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
                'lng'                 => $request->get('lng'),
                'lat'                 => $request->get('lat'),
                'reportBy'            => $request->get('reportBy'),
                'fireSeverity'        => $request->get('fireSeverity'),
                'riskInNeighbourhood' => $request->get('riskInNeighbourhood'),
                'date'                => $request->get('date')
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

    /*
    public function deleteRegister()
    {
        try{
            return Response::json($this->fireBaseService->delete());
        } catch (Exception $error) {
            return Response::json($error->getMessage(),400);
        }
    }
    */
}


