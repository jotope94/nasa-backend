<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;

class FirebaseAuthController extends Controller
{
    protected $auth;
    protected $database;

    public function __construct()
    {
       // $this->auth = Firebase::auth();
        $this->database = app('firebase.database');
    }

    public function teste()
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
}


