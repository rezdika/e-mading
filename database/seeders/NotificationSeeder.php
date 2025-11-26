<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;
use App\Models\User;
use App\Models\Article;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil users
        $admin = User::where('role', 'admin')->first();
        $guru = User::where('role', 'guru')->first();
        $siswa = User::where('role', 'siswa')->first();
        
        // Ambil artikel
        $article = Article::first();
        
        if (!$article) {
            echo "No articles found. Please create articles first.\n";
            return;
        }
        
        // Notifikasi untuk siswa - Artikel disetujui
        if ($siswa) {
            Notification::create([
                'user_id' => $siswa->id,
                'article_id' => $article->id,
                'type' => 'approved',
                'title' => 'Artikel Disetujui! 🎉',
                'message' => 'Artikel "' . $article->judul . '" telah disetujui dan dipublikasikan.',
                'is_read' => false
            ]);
            
            echo "✅ Created 'approved' notification for siswa\n";
        }
        
        // Notifikasi untuk guru - Artikel perlu review
        if ($guru) {
            Notification::create([
                'user_id' => $guru->id,
                'article_id' => $article->id,
                'type' => 'pending',
                'title' => 'Artikel Baru Perlu Review 🔍',
                'message' => 'Artikel "' . $article->judul . '" dari ' . ($siswa ? $siswa->nama : 'Siswa') . ' menunggu persetujuan.',
                'is_read' => false
            ]);
            
            echo "✅ Created 'pending' notification for guru\n";
        }
        
        // Notifikasi untuk admin - Artikel perlu review
        if ($admin) {
            Notification::create([
                'user_id' => $admin->id,
                'article_id' => $article->id,
                'type' => 'pending',
                'title' => 'Artikel Baru Perlu Review 🔍',
                'message' => 'Artikel "' . $article->judul . '" dari ' . ($siswa ? $siswa->nama : 'Siswa') . ' menunggu persetujuan.',
                'is_read' => false
            ]);
            
            echo "✅ Created 'pending' notification for admin\n";
        }
        
        // Notifikasi untuk siswa - Artikel ditolak
        if ($siswa) {
            Notification::create([
                'user_id' => $siswa->id,
                'article_id' => $article->id,
                'type' => 'rejected',
                'title' => 'Artikel Ditolak ❌',
                'message' => 'Artikel "' . $article->judul . '" ditolak. Silakan perbaiki dan kirim ulang.',
                'is_read' => false
            ]);
            
            echo "✅ Created 'rejected' notification for siswa\n";
        }
        
        echo "\n🎉 Notification seeder completed!\n";
        echo "📊 Total notifications created: " . Notification::count() . "\n";
    }
}
