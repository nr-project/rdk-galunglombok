<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('google:sheets:update', function () {
    $this->call('google:sheets:update');
})->hourly()->timezone('Asia/Makassar');

Artisan::command('google:sheets:harian-disiplin', function () {
    $this->call('google:sheets:harian-disiplin');
})->hourly()->timezone('Asia/Makassar');
