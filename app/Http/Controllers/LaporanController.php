<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }
    
    public function generate(Request $request)
    {
        $type = $request->type; // 'monthly' or 'category'
        $format = $request->format; // 'pdf' or 'excel'
        
        if ($type == 'monthly') {
            return $this->generateMonthlyReport($format);
        } else {
            return $this->generateCategoryReport($format);
        }
    }
    
    public function preview(Request $request)
    {
        $type = $request->type; // 'monthly', 'category', or 'articles'
        $kategori = $request->kategori; // optional category filter
        
        if ($type == 'monthly') {
            $data = Article::selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, COUNT(*) as total')
                ->where('status', 'published')
                ->groupBy('year', 'month')
                ->orderBy('year', 'desc')
                ->orderBy('month', 'desc')
                ->get()
                ->map(function($item) {
                    $item->month_name = Carbon::create()->month($item->month)->format('F');
                    return $item;
                });
            $title = 'Laporan Artikel per Bulan';
        } elseif ($type == 'articles') {
            $query = Article::with(['user', 'category'])
                ->where('status', 'published')
                ->orderBy('created_at', 'desc');
            
            if ($kategori) {
                $query->where('id_kategori', $kategori);
                $categoryName = Category::find($kategori)->nama_kategori ?? 'Semua';
                $title = 'Laporan Artikel Kategori: ' . $categoryName;
            } else {
                $title = 'Laporan Artikel';
            }
            
            $data = $query->get();
        } else {
            $data = Category::withCount(['articles' => function($query) {
                    $query->where('status', 'published');
                }])
                ->having('articles_count', '>', 0)
                ->orderBy('articles_count', 'desc')
                ->get();
            $title = 'Laporan Artikel per Kategori';
        }
        
        return view('laporan.preview', compact('data', 'title', 'type', 'kategori'));
    }
    
    private function generateMonthlyReport($format)
    {
        $data = Article::selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, COUNT(*) as total')
            ->where('status', 'published')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get()
            ->map(function($item) {
                $item->month_name = Carbon::create()->month($item->month)->format('F');
                return $item;
            });
            
        if ($format == 'pdf') {
            return $this->generatePDF($data, 'Laporan Artikel per Bulan', 'monthly');
        } else {
            return $this->generateExcel($data, 'laporan_bulanan.csv', 'monthly');
        }
    }
    
    private function generateCategoryReport($format)
    {
        $data = Category::withCount(['articles' => function($query) {
                $query->where('status', 'published');
            }])
            ->having('articles_count', '>', 0)
            ->orderBy('articles_count', 'desc')
            ->get();
            
        if ($format == 'pdf') {
            return $this->generatePDF($data, 'Laporan Artikel per Kategori', 'category');
        } else {
            return $this->generateExcel($data, 'laporan_kategori.csv', 'category');
        }
    }
    
    private function generatePDF($data, $title, $type)
    {
        $html = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; }
                table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                th { background-color: #f2f2f2; }
                h1 { color: #333; text-align: center; }
            </style>
        </head>
        <body>
            <h1>$title</h1>
            <p>Tanggal: " . date('d F Y') . "</p>
            <table>
                <thead>
                    <tr>";
        
        if ($type == 'monthly') {
            $html .= "<th>Tahun</th><th>Bulan</th><th>Jumlah Artikel</th>";
        } else {
            $html .= "<th>Kategori</th><th>Jumlah Artikel</th>";
        }
        
        $html .= "</tr></thead><tbody>";
        
        foreach ($data as $item) {
            $html .= "<tr>";
            if ($type == 'monthly') {
                $html .= "<td>{$item->year}</td><td>{$item->month_name}</td><td>{$item->total}</td>";
            } else {
                $html .= "<td>{$item->nama_kategori}</td><td>{$item->articles_count}</td>";
            }
            $html .= "</tr>";
        }
        
        $html .= "</tbody></table></body></html>";
        
        return response($html)
            ->header('Content-Type', 'text/html')
            ->header('Content-Disposition', 'attachment; filename="' . strtolower(str_replace(' ', '_', $title)) . '.html"');
    }
    
    private function generateExcel($data, $filename, $type)
    {
        $csv = '';
        
        if ($type == 'monthly') {
            $csv = "Tahun,Bulan,Jumlah Artikel\n";
            foreach ($data as $item) {
                $csv .= "{$item->year},{$item->month_name},{$item->total}\n";
            }
        } else {
            $csv = "Kategori,Jumlah Artikel\n";
            foreach ($data as $item) {
                $csv .= "{$item->nama_kategori},{$item->articles_count}\n";
            }
        }
        
        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
}