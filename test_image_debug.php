<?php
// Test file untuk debug masalah gambar

echo "<h2>🔍 Debug Gambar Upload - Arga Mading</h2>";

// 1. Cek storage link
echo "<h3>1. Storage Link Status</h3>";
$publicStoragePath = public_path('storage');
$storageAppPublicPath = storage_path('app/public');

echo "Public storage path: " . $publicStoragePath . "<br>";
echo "Storage app/public path: " . $storageAppPublicPath . "<br>";
echo "Storage link exists: " . (is_link($publicStoragePath) ? '✅ YES' : '❌ NO') . "<br>";
echo "Storage directory exists: " . (is_dir($storageAppPublicPath) ? '✅ YES' : '❌ NO') . "<br>";

// 2. Cek folder articles
echo "<h3>2. Articles Folder Status</h3>";
$articlesPath = storage_path('app/public/articles');
echo "Articles folder exists: " . (is_dir($articlesPath) ? '✅ YES' : '❌ NO') . "<br>";

if (is_dir($articlesPath)) {
    $files = scandir($articlesPath);
    $imageFiles = array_filter($files, function($file) {
        return in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif']);
    });
    echo "Total image files: " . count($imageFiles) . "<br>";
    
    if (count($imageFiles) > 0) {
        echo "<h4>Sample images:</h4>";
        $sampleFiles = array_slice($imageFiles, 0, 3);
        foreach ($sampleFiles as $file) {
            $fullPath = $articlesPath . '/' . $file;
            $publicUrl = asset('storage/articles/' . $file);
            echo "File: {$file}<br>";
            echo "Size: " . filesize($fullPath) . " bytes<br>";
            echo "URL: <a href='{$publicUrl}' target='_blank'>{$publicUrl}</a><br>";
            echo "Image test: <img src='{$publicUrl}' style='max-width:200px;max-height:150px;' onerror='this.style.border=\"2px solid red\"; this.alt=\"❌ FAILED TO LOAD\"'><br><br>";
        }
    }
}

// 3. Cek permission
echo "<h3>3. Permission Check</h3>";
echo "Storage writable: " . (is_writable(storage_path('app/public')) ? '✅ YES' : '❌ NO') . "<br>";
echo "Articles folder writable: " . (is_writable($articlesPath) ? '✅ YES' : '❌ NO') . "<br>";

// 4. Test URL generation
echo "<h3>4. URL Generation Test</h3>";
$testFileName = 'test-image.jpg';
$storageUrl = asset('storage/articles/' . $testFileName);
$directUrl = url('storage/articles/' . $testFileName);
echo "Asset URL: {$storageUrl}<br>";
echo "Direct URL: {$directUrl}<br>";

// 5. Laravel config check
echo "<h3>5. Laravel Config</h3>";
echo "APP_URL: " . (env('APP_URL') ?: 'Not set') . "<br>";
echo "FILESYSTEM_DISK: " . (env('FILESYSTEM_DISK') ?: 'local') . "<br>";

echo "<hr>";
echo "<p><strong>💡 Solusi yang mungkin:</strong></p>";
echo "<ul>";
echo "<li>Jika storage link ❌: Jalankan <code>php artisan storage:link</code></li>";
echo "<li>Jika permission ❌: Set permission folder storage</li>";
echo "<li>Jika gambar tidak load: Cek .htaccess atau web server config</li>";
echo "<li>Jika URL salah: Cek APP_URL di .env</li>";
echo "</ul>";
?>