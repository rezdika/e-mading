<?php
// Script untuk memeriksa routes komentar
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

echo "=== CHECKING COMMENT ROUTES ===\n\n";

// Get all routes
$routes = $app['router']->getRoutes();

echo "Routes terkait komentar:\n";
foreach ($routes as $route) {
    $uri = $route->uri();
    $methods = implode('|', $route->methods());
    $name = $route->getName();
    $action = $route->getActionName();
    
    if (strpos($uri, 'comment') !== false || strpos($name ?? '', 'comment') !== false) {
        echo "- {$methods} {$uri}";
        if ($name) echo " (name: {$name})";
        echo " -> {$action}\n";
    }
}

echo "\n=== MIDDLEWARE CHECK ===\n";
$commentStoreRoute = null;
foreach ($routes as $route) {
    if ($route->uri() === 'articles/{id}/comments' && in_array('POST', $route->methods())) {
        $commentStoreRoute = $route;
        break;
    }
}

if ($commentStoreRoute) {
    echo "Route untuk POST comments ditemukan:\n";
    echo "- URI: " . $commentStoreRoute->uri() . "\n";
    echo "- Methods: " . implode(', ', $commentStoreRoute->methods()) . "\n";
    echo "- Middleware: " . implode(', ', $commentStoreRoute->middleware()) . "\n";
    echo "- Action: " . $commentStoreRoute->getActionName() . "\n";
} else {
    echo "❌ Route untuk POST comments TIDAK ditemukan!\n";
}

echo "\n=== TROUBLESHOOTING STEPS ===\n";
echo "1. Pastikan user sudah login sebagai siswa\n";
echo "2. Periksa apakah CSRF token valid\n";
echo "3. Cek browser console untuk error JavaScript\n";
echo "4. Lihat network tab untuk melihat request yang dikirim\n";
echo "5. Periksa log Laravel di storage/logs/laravel.log\n";
?>