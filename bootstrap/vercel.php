<?php

use Illuminate\Contracts\Console\Kernel as ConsoleKernel;
use Illuminate\Contracts\Http\Kernel as HttpKernel;

define('LARAVEL_START', microtime(true));

// Load composer autoload
require __DIR__ . '/../vendor/autoload.php';

// Load environment variables
$app = require_once __DIR__ . '/app.php';

// Set storage path to /tmp for Vercel
$app->useStoragePath($_ENV['APP_STORAGE'] ?? '/tmp/storage');

return $app;
