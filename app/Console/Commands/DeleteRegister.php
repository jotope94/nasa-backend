<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\FireBaseService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;

class DeleteRegister extends Command
{
    // Hours for delete
    const HOURS_DELETE = 48;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'register:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete the record from 48 hours ago.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $fireBaseService = new FireBaseService;
        $registers = $fireBaseService->get();
        
        $now = Carbon::now();
        $deleteRegister = [];

        foreach ($registers as $key => $register) {
            $dataRegister = Carbon::parse($register['date']);
            $diffHours    = $dataRegister->diffInHours($now);
            if ($diffHours > self::HOURS_DELETE) {
                array_push($deleteRegister, $key);
            }
        }

        $fireBaseService->delete($deleteRegister);
        return Command::SUCCESS;
    }
}
