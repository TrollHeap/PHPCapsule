<?php

declare(strict_types=1);

session_start();
require dirname(__DIR__, 2) . '/lib/autoload.php';

use CapsuleLib\Http\Middleware\AuthMiddleware;

AuthMiddleware::handle(); // 🚫 Bloque si non connecté

echo "Bienvenue dans l'espace admin.";
