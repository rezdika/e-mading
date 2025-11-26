<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function store(Request $request, $articleId)
    {
        if (!Auth::check()) {
            if ($request->ajax()) {
                return response()->json(['error' => 'Silakan login terlebih dahulu.'], 401);
            }
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $request->validate([
            'komentar' => 'required|string|max:1000|min:3'
        ]);

        $comment = Comment::create([
            'id_artikel' => $articleId,
            'id_user' => Auth::id(),
            'komentar' => trim($request->komentar)
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Komentar berhasil ditambahkan!',
                'comment_id' => $comment->id,
                'comment' => $comment->komentar,
                'user_name' => Auth::user()->nama,
                'user_initial' => strtoupper(substr(Auth::user()->nama, 0, 1))
            ]);
        }

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }

    public function destroy(Request $request, $id)
    {
        try {
            $comment = Comment::findOrFail($id);
            
            // Only allow user to delete their own comment or admin/guru
            if (Auth::id() == $comment->id_user || in_array(Auth::user()->role, ['admin', 'guru'])) {
                $comment->delete();
                
                if ($request->ajax()) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Komentar berhasil dihapus!'
                    ]);
                }
                
                return redirect()->back()->with('success', 'Komentar berhasil dihapus!')->withFragment('comments-section');
            }
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Anda tidak memiliki izin untuk menghapus komentar ini!'
                ], 403);
            }
            
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus komentar ini!')->withFragment('comments-section');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menghapus komentar. Silakan coba lagi.'
                ], 500);
            }
            
            return redirect()->back()->with('error', 'Gagal menghapus komentar. Silakan coba lagi.')->withFragment('comments-section');
        }
    }
}