<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\GoogleSheetController;
use Illuminate\Support\Facades\App;

class UpdateGoogleSheetData extends Command
{
    protected $signature = 'google:sheets:update';
    protected $description = 'Update data from Google Sheets';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            // Use dependency injection instead of direct instantiation
            $controller = App::make(GoogleSheetController::class);
            $result = $controller->import(); 
            
            $this->info('Google Sheets data updated successfully.');
            $this->info($result); 
        } catch (\Exception $e) {
            // Handle exceptions and output errors
            $this->error('Error updating Google Sheets: ' . $e->getMessage());
        }
    }
}
