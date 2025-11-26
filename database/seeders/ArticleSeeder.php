<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\User;
use App\Models\Category;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        $admin = User::where('role', 'admin')->first();
        $guru = User::where('role', 'guru')->first();
        
        $categories = Category::all();
        
        if ($categories->isEmpty()) {
            // Create default categories if none exist
            $category1 = Category::create(['nama' => 'Wisata Alam']);
            $category2 = Category::create(['nama' => 'Teknologi']);
            $category3 = Category::create(['nama' => 'Pendidikan']);
            $categories = collect([$category1, $category2, $category3]);
        }

        $articles = [
            [
                'judul' => 'Keindahan Gunung Bromo yang Memukau',
                'isi' => 'Gunung Bromo merupakan salah satu destinasi wisata alam yang paling terkenal di Indonesia. Terletak di Jawa Timur, gunung berapi aktif ini menawarkan pemandangan yang sangat menakjubkan, terutama saat matahari terbit.

Kawah Bromo yang masih aktif memberikan pesona tersendiri dengan asap putih yang mengepul dari dalamnya. Pengunjung dapat menikmati keindahan ini dari berbagai sudut pandang, mulai dari Penanjakan 1 hingga area sekitar kawah.

Selain pemandangan alamnya, Bromo juga memiliki nilai budaya yang tinggi bagi masyarakat Tengger. Setiap tahunnya, mereka mengadakan upacara Kasada sebagai bentuk rasa syukur dan permohonan kepada Sang Hyang Widhi.

Untuk mencapai Bromo, pengunjung bisa memulai perjalanan dari Malang atau Probolinggo. Perjalanan menuju puncak memang cukup menantang, namun semua lelah akan terbayar dengan pemandangan yang luar biasa indah.',
                'tanggal' => now()->subDays(2),
                'status' => 'published',
            ],
            [
                'judul' => 'Pesona Air Terjun Sekumpul yang Menyejukkan',
                'isi' => 'Air Terjun Sekumpul di Bali merupakan salah satu air terjun terindah di Indonesia. Terletak di Desa Sekumpul, Kabupaten Buleleng, air terjun ini menawarkan pemandangan yang sangat memukau dengan ketinggian mencapai 80 meter.

Yang membuat Sekumpul istimewa adalah terdapat tujuh air terjun yang berderet dalam satu lokasi. Air yang jatuh dari ketinggian menciptakan kabut halus yang menyejukkan dan memberikan efek pelangi yang indah ketika terkena sinar matahari.

Perjalanan menuju Air Terjun Sekumpul memang cukup menantang. Pengunjung harus berjalan kaki sekitar 30 menit melalui jalan setapak yang menurun dan terkadang licin. Namun, semua usaha tersebut akan terbayar dengan keindahan alam yang luar biasa.

Di sekitar air terjun, terdapat kolam alami yang jernih dan segar. Pengunjung bisa berendam atau sekadar membasahi kaki sambil menikmati suasana alam yang tenang dan damai.',
                'tanggal' => now()->subDays(1),
                'status' => 'published',
            ],
            [
                'judul' => 'Teknologi AI dalam Pendidikan Modern',
                'isi' => 'Artificial Intelligence (AI) atau Kecerdasan Buatan telah merevolusi berbagai aspek kehidupan, termasuk dalam bidang pendidikan. Teknologi ini membawa perubahan signifikan dalam cara kita belajar dan mengajar.

Salah satu penerapan AI dalam pendidikan adalah sistem pembelajaran adaptif. Sistem ini dapat menyesuaikan materi pembelajaran berdasarkan kemampuan dan gaya belajar masing-masing siswa. Dengan demikian, setiap siswa dapat belajar dengan kecepatan dan metode yang paling sesuai untuk mereka.

Chatbot pendidikan juga menjadi salah satu inovasi yang menarik. Siswa dapat bertanya kapan saja dan mendapat jawaban instan untuk pertanyaan-pertanyaan akademis mereka. Ini sangat membantu dalam proses belajar mandiri.

Selain itu, AI juga membantu guru dalam mengevaluasi kemajuan siswa secara real-time. Sistem dapat menganalisis pola belajar siswa dan memberikan rekomendasi untuk perbaikan metode pengajaran.',
                'tanggal' => now(),
                'status' => 'published',
            ],
            [
                'judul' => 'Pentingnya Literasi Digital di Era Modern',
                'isi' => 'Di era digital seperti sekarang ini, literasi digital menjadi keterampilan yang sangat penting untuk dimiliki oleh setiap orang. Literasi digital bukan hanya tentang kemampuan menggunakan teknologi, tetapi juga tentang pemahaman yang mendalam tentang dunia digital.

Literasi digital mencakup kemampuan untuk mencari, mengevaluasi, dan menggunakan informasi secara efektif. Dalam era informasi yang berlimpah ini, kemampuan untuk membedakan informasi yang valid dan hoaks menjadi sangat krusial.

Selain itu, literasi digital juga meliputi pemahaman tentang keamanan siber. Setiap pengguna internet perlu memahami cara melindungi data pribadi dan menghindari berbagai ancaman siber seperti phishing dan malware.

Pendidikan literasi digital harus dimulai sejak dini. Sekolah-sekolah perlu mengintegrasikan pembelajaran literasi digital dalam kurikulum mereka agar siswa dapat menghadapi tantangan dunia digital dengan lebih baik.',
                'tanggal' => now()->subHours(6),
                'status' => 'published',
            ],
            [
                'judul' => 'Manfaat Pembelajaran Berbasis Proyek',
                'isi' => 'Pembelajaran berbasis proyek (Project-Based Learning) merupakan metode pembelajaran yang sangat efektif untuk mengembangkan keterampilan siswa secara holistik. Metode ini tidak hanya fokus pada aspek kognitif, tetapi juga mengembangkan keterampilan sosial dan emosional.

Dalam pembelajaran berbasis proyek, siswa dihadapkan pada masalah nyata yang harus mereka selesaikan. Hal ini membuat pembelajaran menjadi lebih bermakna dan relevan dengan kehidupan sehari-hari. Siswa tidak hanya menghafal teori, tetapi juga menerapkannya dalam konteks yang nyata.

Metode ini juga mendorong kolaborasi antar siswa. Mereka belajar bekerja dalam tim, berbagi ide, dan menghargai perbedaan pendapat. Keterampilan ini sangat penting untuk persiapan mereka menghadapi dunia kerja di masa depan.

Selain itu, pembelajaran berbasis proyek juga mengembangkan kreativitas dan kemampuan berpikir kritis siswa. Mereka dituntut untuk mencari solusi inovatif dan mengevaluasi berbagai alternatif pemecahan masalah.',
                'tanggal' => now()->subHours(12),
                'status' => 'published',
            ]
        ];

        foreach ($articles as $index => $articleData) {
            Article::create([
                'judul' => $articleData['judul'],
                'isi' => $articleData['isi'],
                'tanggal' => $articleData['tanggal'],
                'id_user' => $index % 2 == 0 ? $admin->id : ($guru ? $guru->id : $admin->id),
                'id_kategori' => $categories->random()->id,
                'status' => $articleData['status'],
            ]);
        }
    }
}