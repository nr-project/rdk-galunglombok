<?php

namespace App\Services;

use Google\Client;
use Google\Service\Sheets;

class GoogleSheetsService
{
    protected $client;
    protected $sheetsService;

    public function __construct()


    {
        $this->client = new Client();
        $this->client->setAuthConfig(config('google.credentials'));
        $this->client->addScope(Sheets::SPREADSHEETS);
        $this->sheetsService = new Sheets($this->client);
    }

    public function getSheetData($spreadsheetId, $range)
    {
    try {
        $response = $this->sheetsService->spreadsheets_values->get($spreadsheetId, $range);
        return $response->getValues();
    } catch (\Exception $e) {
        // Log error or handle it appropriately
        return ['error' => $e->getMessage()];
    }
    }
}
