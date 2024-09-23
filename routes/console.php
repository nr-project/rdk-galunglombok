<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('google:sheets:update', function () {
    $this->call('google:sheets:update');
})->dailyAt('7:00')->timezone('Asia/Makassar');

Artisan::command('google:sheets:harian-disiplin', function () {
    $this->call('google:sheets:harian-disiplin');
})->dailyAt('7:02')->timezone('Asia/Makassar');
