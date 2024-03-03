<?php

use core\Core;
use models\Backup;

spl_autoload_register(function ($className) {
    $path = $className.".php";
    if (is_file($path)) {
        require($path);
    }
});

$core = Core::getInstance();
$core->Initialize();

// Отримуємо поточний час у Києві
date_default_timezone_set('Europe/Kiev');
$current_time = date('H:i:s');

// Перевіряємо, чи поточний час дорівнює 14:00:01
if ($current_time === '14:00:01') {
    // Викликаємо функцію створення резервної копії
    Backup::createBackup();
}

$core->Run();
$core->Done();

