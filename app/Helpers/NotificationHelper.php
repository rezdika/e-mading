<?php

namespace App\Helpers;

use App\Models\Notification;
use App\Models\User;

class NotificationHelper
{


    /**
     * Buat notifikasi untuk guru/admin ketika ada artikel baru dari siswa
     */
    public static function createModerationNotification($article)
    {
        $moderators = User::whereIn('role', ['guru', 'admin'])->get();
        $author = User::find($article->id_user);
        
        $title = 'Artikel Baru Perlu Review 🔍';
        $message = 'Artikel "' . $article->judul . '" dari ' . $author->nama . ' menunggu persetujuan.';

        foreach ($moderators as $moderator) {
            Notification::create([
                'user_id' => $moderator->id,
                'article_id' => $article->id,
                'type' => 'pending',
                'title' => $title,
                'message' => $message
            ]);
        }
    }

    /**
     * Buat notifikasi untuk siswa ketika artikel disetujui/ditolak
     */
    public static function createApprovalNotification($article, $type)
    {
        $title = $type === 'approved' ? 'Artikel Disetujui! 🎉' : 'Artikel Ditolak ❌';
        $message = $type === 'approved'
            ? 'Artikel "' . $article->judul . '" telah disetujui dan dipublikasikan.'
            : 'Artikel "' . $article->judul . '" ditolak. Silakan perbaiki dan kirim ulang.';

        return Notification::create([
            'user_id' => $article->id_user,
            'article_id' => $article->id,
            'type' => $type,
            'title' => $title,
            'message' => $message
        ]);
    }

    /**
     * Dapatkan jumlah notifikasi yang belum dibaca
     */
    public static function getUnreadCount($userId)
    {
        return Notification::where('user_id', $userId)
            ->where('is_read', false)
            ->count();
    }

    /**
     * Dapatkan notifikasi terbaru
     */
    public static function getRecentNotifications($userId, $limit = 5)
    {
        return Notification::where('user_id', $userId)
            ->with('article')
            ->orderBy('created_at', 'desc')
            ->take($limit)
            ->get();
    }
}