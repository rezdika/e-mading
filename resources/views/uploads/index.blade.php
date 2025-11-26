<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Upload Gambar/Dokumen - Mading Arga</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom-icons.css') }}" rel="stylesheet">
    
    <style>
        body {
            background: #f9f8f6;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
        }
        
        .container {
            padding: 20px;
            position: relative;
            z-index: 1;
        }
        
        .header-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.2);
            padding: 3rem;
            margin-bottom: 2rem;
            color: white;
        }
        
        .upload-zone {
            background: #efe9e3;
            border: 3px dashed #c9b59c;
            border-radius: 20px;
            padding: 4rem 2rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .upload-zone:hover {
            border-color: #b8a082;
            background: #e8e0d8;
            transform: translateY(-2px);
        }
        
        .upload-zone.dragover {
            border-color: #b8a082;
            background: #e8e0d8;
        }
        
        .file-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        
        .file-card {
            background: #efe9e3;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(201, 181, 156, 0.2);
            border: 1px solid #d9cfc7;
            transition: all 0.3s ease;
        }
        
        .file-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(201, 181, 156, 0.3);
        }
        
        .file-preview {
            width: 100%;
            height: 150px;
            border-radius: 15px;
            object-fit: cover;
            margin-bottom: 15px;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .file-icon {
            font-size: 4rem;
            color: #6c757d;
        }
        
        .btn-primary {
            background: #c9b59c;
            border: none;
            border-radius: 20px;
            padding: 12px 24px;
            font-weight: 600;
            color: white;
        }
        
        .btn-primary:hover {
            background: #b8a082;
        }
        
        .btn-danger {
            background: #dc3545;
            border: none;
            border-radius: 10px;
        }
        

        
        .progress-bar {
            background: #c9b59c;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <!-- Header -->
        <div class="header-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div style="font-size: 3rem; margin-bottom: 1rem;">☁️</div>
                    <h1 class="h3 mb-2">Upload Gambar & Dokumen</h1>
                    <p class="mb-0" style="opacity: 0.9;">Kelola file dan media untuk mading digital</p>
                </div>
                <a href="{{ route('dashboard') }}" class="btn btn-light">
                    <i class="bi bi-arrow-left"></i> Dashboard
                </a>
            </div>
        </div>

        <!-- Upload Zone -->
        <div class="upload-zone" id="uploadZone">
            <div class="upload-content">
                <div style="font-size: 4rem; color: #c9b59c; margin-bottom: 20px;">☁️</div>
                <h4 style="color: #5a5a5a; margin-bottom: 15px;">📤 Drag & Drop File Disini</h4>
                <p class="text-muted mb-3">atau klik untuk memilih file</p>
                <input type="file" id="fileInput" multiple accept="image/*,.pdf,.doc,.docx,.txt" style="display: none;">
                <button type="button" class="btn btn-primary" onclick="document.getElementById('fileInput').click()">
                    <i class="bi bi-plus-circle"></i> Pilih File
                </button>
                <div class="mt-3">
                    <small class="text-muted">
                        🖼️ Format: JPG, PNG, GIF, PDF, DOC, DOCX, TXT<br>
                        📄 Maksimal: 10MB per file
                    </small>
                </div>
            </div>
        </div>

        <!-- Progress Bar -->
        <div class="progress mt-3" id="progressContainer" style="display: none;">
            <div class="progress-bar" role="progressbar" id="progressBar" style="width: 0%"></div>
        </div>

        <!-- Files Grid -->
        <div class="file-grid" id="fileGrid">
            @foreach($files as $file)
                <div class="file-card" data-filename="{{ $file['name'] }}">
                    @if(in_array(strtolower($file['type']), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                        <img src="{{ $file['url'] }}" alt="{{ $file['name'] }}" class="file-preview">
                    @else
                        <div class="file-preview">
                            @switch(strtolower($file['type']))
                                @case('pdf')
                                    <div class="file-icon" style="color: #dc3545;">📄</div>
                                    @break
                                @case('doc')
                                @case('docx')
                                    <div class="file-icon" style="color: #0d6efd;">📄</div>
                                    @break
                                @case('txt')
                                    <div class="file-icon" style="color: #6c757d;">📝</div>
                                    @break
                                @default
                                    <div class="file-icon" style="color: #6c757d;">📁</div>
                            @endswitch
                        </div>
                    @endif
                    
                    <div class="file-info">
                        <h6 class="mb-2" style="color: #4a5568;">{{ Str::limit($file['name'], 25) }}</h6>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted">{{ number_format($file['size'] / 1024, 1) }} KB</small>
                            <span class="badge" style="background: #c9b59c; color: white;">
                                {{ strtoupper($file['type']) }}
                            </span>
                        </div>
                        <div class="d-flex gap-2">
                            @if(in_array(strtolower($file['type']), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                <button class="btn btn-sm btn-outline-primary flex-fill" onclick="viewImage('{{ $file['url'] }}', '{{ $file['name'] }}')">
                                    👁️ Lihat
                                </button>
                            @else
                                <a href="{{ $file['url'] }}" target="_blank" class="btn btn-sm btn-outline-primary flex-fill">
                                    📥 Download
                                </a>
                            @endif
                            <button class="btn btn-sm btn-danger" onclick="deleteFile('{{ $file['name'] }}')">
                                🗑️
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($files->isEmpty())
            <div class="text-center mt-5">
                <div style="font-size: 4rem; color: #d9cfc7;">📁</div>
                <p class="text-muted mt-3">Belum ada file yang diupload</p>
            </div>
        @endif
    </div>

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="background: transparent; border: none;">
                <div class="modal-header" style="background: rgba(0,0,0,0.8); border: none;">
                    <h5 class="modal-title text-white" id="imageModalLabel">Preview Gambar</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center" style="background: rgba(0,0,0,0.9); padding: 0;">
                    <img id="modalImage" src="" alt="" style="max-width: 100%; max-height: 70vh; object-fit: contain;">
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <script>
        const uploadZone = document.getElementById('uploadZone');
        const fileInput = document.getElementById('fileInput');
        const progressContainer = document.getElementById('progressContainer');
        const progressBar = document.getElementById('progressBar');
        const fileGrid = document.getElementById('fileGrid');

        // Drag and drop functionality
        uploadZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadZone.classList.add('dragover');
        });

        uploadZone.addEventListener('dragleave', () => {
            uploadZone.classList.remove('dragover');
        });

        uploadZone.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadZone.classList.remove('dragover');
            const files = e.dataTransfer.files;
            handleFiles(files);
        });

        uploadZone.addEventListener('click', () => {
            fileInput.click();
        });

        fileInput.addEventListener('change', (e) => {
            handleFiles(e.target.files);
        });

        function handleFiles(files) {
            if (files.length === 0) return;

            const formData = new FormData();
            for (let file of files) {
                formData.append('files[]', file);
            }

            // Show progress
            progressContainer.style.display = 'block';
            progressBar.style.width = '0%';

            // Upload files
            fetch('{{ route("uploads.upload") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                progressBar.style.width = '100%';
                
                if (data.success) {
                    // Show success message
                    showAlert('success', data.message);
                    
                    // Reload page to show new files
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    showAlert('danger', 'Upload gagal!');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('danger', 'Terjadi kesalahan saat upload!');
            })
            .finally(() => {
                setTimeout(() => {
                    progressContainer.style.display = 'none';
                }, 1000);
            });
        }

        function deleteFile(filename) {
            if (!confirm('Yakin ingin menghapus file ini?')) return;

            fetch('{{ route("uploads.delete") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ filename: filename })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Remove file card from DOM
                    const fileCard = document.querySelector(`[data-filename="${filename}"]`);
                    if (fileCard) {
                        fileCard.style.animation = 'fadeOut 0.3s ease-out forwards';
                        setTimeout(() => fileCard.remove(), 300);
                    }
                    showAlert('success', data.message);
                } else {
                    showAlert('danger', data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('danger', 'Terjadi kesalahan saat menghapus file!');
            });
        }

        function viewImage(url, name) {
            document.getElementById('modalImage').src = url;
            document.getElementById('imageModalLabel').textContent = name;
            new bootstrap.Modal(document.getElementById('imageModal')).show();
        }

        function showAlert(type, message) {
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
            alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
            alertDiv.innerHTML = `
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            document.body.appendChild(alertDiv);

            setTimeout(() => {
                alertDiv.remove();
            }, 5000);
        }

        // Add CSS for fade out animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeOut {
                from { opacity: 1; transform: scale(1); }
                to { opacity: 0; transform: scale(0.8); }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>