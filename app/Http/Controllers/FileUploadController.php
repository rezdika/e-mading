<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function index()
    {
        $files = collect(Storage::disk('public')->files('uploads'))
            ->map(function ($file) {
                return [
                    'name' => basename($file),
                    'path' => $file,
                    'url' => Storage::url($file),
                    'size' => Storage::disk('public')->size($file),
                    'type' => pathinfo($file, PATHINFO_EXTENSION),
                    'modified' => Storage::disk('public')->lastModified($file)
                ];
            })
            ->sortByDesc('modified');

        return view('uploads.index', compact('files'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'files.*' => 'required|file|max:10240', // 10MB max
        ]);

        $uploadedFiles = [];

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('uploads', $filename, 'public');
                
                $uploadedFiles[] = [
                    'name' => $filename,
                    'path' => $path,
                    'url' => Storage::url($path)
                ];
            }
        }

        return response()->json([
            'success' => true,
            'files' => $uploadedFiles,
            'message' => count($uploadedFiles) . ' file(s) berhasil diupload!'
        ]);
    }

    public function delete(Request $request)
    {
        $filename = $request->input('filename');
        $path = 'uploads/' . $filename;

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            return response()->json(['success' => true, 'message' => 'File berhasil dihapus!']);
        }

        return response()->json(['success' => false, 'message' => 'File tidak ditemukan!']);
    }
}