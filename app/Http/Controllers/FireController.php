<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Services\FireBaseService;

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
    public function create(Request $request)
    {
        
        $data = [];
        return Response::json($this->fireBaseService->create($data))
    }

    public function get()
    {
        return Response::json($this->fireBaseService->get());
    }
}


