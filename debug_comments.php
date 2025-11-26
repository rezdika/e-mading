<?php
// Debug script untuk masalah komentar
require_once 'vendor/autoload.php';

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

echo "=== DEBUG KOMENTAR SISTEM ===\n\n";

// Test database connection
try {
    $pdo = new PDO('mysql:host=localhost;dbname=arga_mading', 'root', '');
    echo "✓ Database connection: OK\n";
    
    // Check comments table
    $stmt = $pdo->query("DESCRIBE comments");
    echo "✓ Comments table structure:\n";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "  - {$row['Field']}: {$row['Type']}\n";
    }
    
    // Check recent comments
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM comments");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "✓ Total comments in database: {$result['total']}\n";
    
    // Check users table
    $stmt = $pdo->query("SELECT id, nama, role FROM users WHERE role = 'siswa' LIMIT 3");
    echo "✓ Sample siswa users:\n";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "  - ID: {$row['id']}, Nama: {$row['nama']}, Role: {$row['role']}\n";
    }
    
} catch (Exception $e) {
    echo "✗ Database error: " . $e->getMessage() . "\n";
}

echo "\n=== SOLUSI YANG BISA DICOBA ===\n";
echo "1. Clear browser cache dan cookies\n";
echo "2. Logout dan login ulang sebagai siswa\n";
echo "3. Periksa console browser untuk error JavaScript\n";
echo "4. Pastikan artikel yang dikomentar statusnya 'published'\n";
echo "5. Coba disable JavaScript validation sementara\n";

echo "\n=== LANGKAH DEBUGGING ===\n";
echo "1. Buka Developer Tools (F12) di browser\n";
echo "2. Pergi ke tab Console\n";
echo "3. Coba submit komentar\n";
echo "4. Lihat apakah ada error merah di console\n";
echo "5. Pergi ke tab Network, lihat apakah request POST terkirim\n";
?>