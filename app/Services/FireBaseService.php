<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Kreait\Laravel\Firebase\Facades\Firebase;

class FireBaseService
{
    protected $database;

    public function __construct()
    {
        $this->database = app('firebase.database');
    }

    public function create(Request $request)
    {

        $this->database->getReference('report')
        ->push([
            'amount'=>505,
            'currency'=>'$',
            'payment_method'=>'paypal5'
        ]);

        $this->database->getReference('report')
            ->push([
                'amount'=>506,
                'currency'=>'$',
                'payment_method'=>'paypal6'
            ]);

        dd($this->database->getReference('report')->getValue());
    }

    public function get()
    {
        return Response::json($this->database->getReference('report')->getValue());
    }
}


