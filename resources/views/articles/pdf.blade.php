<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->judul }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #c9b59c;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #c9b59c;
            margin-bottom: 10px;
        }
        h1 {
            color: #333;
            font-size: 28px;
            margin: 20px 0;
            line-height: 1.3;
        }
        .meta {
            color: #666;
            font-size: 14px;
            margin: 15px 0;
            padding: 10px;
            background: #f9f8f6;
            border-radius: 5px;
        }
        .meta-item {
            display: inline-block;
            margin-right: 20px;
        }
        .category {
            display: inline-block;
            background: #c9b59c;
            color: white;
            padding: 5px 15px;
            border-radius: 15px;
            font-size: 12px;
            margin-bottom: 10px;
        }
        .content {
            margin-top: 30px;
            text-align: justify;
            font-size: 14px;
        }
        .content p {
            margin-bottom: 15px;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #efe9e3;
            text-align: center;
            color: #999;
            font-size: 12px;
        }
        .image-container {
            text-align: center;
            margin: 20px 0;
        }
        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">📋 Mading 666</div>
        <p style="margin: 0; color: #666;">E-Mading Sekolah</p>
    </div>

    <div class="category">📂 {{ $article->category->nama_kategori ?? 'Umum' }}</div>
    
    <h1>{{ $article->judul }}</h1>
    
    <div class="meta">
        <div class="meta-item">
            <strong>👤 Penulis:</strong> {{ $article->user->nama }}
        </div>
        <div class="meta-item">
            <strong>📅 Tanggal:</strong> {{ $article->tanggal->format('d F Y') }}
        </div>
        <div class="meta-item">
            <strong>❤️ Likes:</strong> {{ $article->likesCount() }}
        </div>
        <div class="meta-item">
            <strong>💬 Komentar:</strong> {{ $article->commentsCount() }}
        </div>
    </div>

    @if($article->foto)
    <div class="image-container">
        <img src="{{ asset('storage/' . $article->foto) }}" alt="{{ $article->judul }}">
    </div>
    @endif

    <div class="content">
        {!! nl2br(e($article->isi)) !!}
    </div>

    <div class="footer">
        <p>Dokumen ini diunduh dari E-Mading Sekolah</p>
        <p>© {{ date('Y') }} Mading 666 - Semua hak dilindungi</p>
        <p style="font-size: 10px; color: #ccc;">Diunduh pada: {{ now()->format('d F Y H:i') }}</p>
        <div style="margin-top: 20px;">
            <a href="{{ route('blog-details', $article->id) }}" style="display: inline-block; background: #c9b59c; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">← Kembali ke Artikel</a>
        </div>
    </div>
</body>
</html>
