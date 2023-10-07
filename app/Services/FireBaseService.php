<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Exception;

class FireBaseService
{
    protected $database;

    public function __construct()
    {
        $this->database = app('firebase.database');
    }

    public function create($data)
    {
        try {
            $this->database->getReference('report')
        ->push($data);
        }catch (Exception $error) {
            return throw new Exception($error->getMessage());
        } 
    }

    public function get()
    {
        try{
            return $this->database->getReference('report')->getValue();
        }catch (Exception $error) {
            return throw new Exception($error->getMessage());
        } 
    }
}


