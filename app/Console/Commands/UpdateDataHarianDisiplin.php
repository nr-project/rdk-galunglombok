<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\GoogleSheetController;
use App\Http\Controllers\SheetHarianDisiplinController;
use Illuminate\Support\Facades\App;

class UpdateDataHarianDisiplin extends Command
{
    protected $signature = 'google:sheets:harian-disiplin';
    protected $description = 'Update data Harian Disiplin';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            // Use dependency injection instead of direct instantiation
            $controller = App::make(SheetHarianDisiplinController::class);
            $result = $controller->import(); 
            
            $this->info('Google Sheets data updated successfully.');
            $this->info($result); 
        } catch (\Exception $e) {
            // Handle exceptions and output errors
            $this->error('Error updating Google Sheets: ' . $e->getMessage());
        }
    }
}

