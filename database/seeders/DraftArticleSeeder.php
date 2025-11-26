<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\User;
use App\Models\Category;

class DraftArticleSeeder extends Seeder
{
    public function run()
    {
        $siswa = User::where('role', 'siswa')->first();
        $categories = Category::all();
        
        if (!$siswa || $categories->isEmpty()) {
            return;
        }

        $draftArticles = [
            [
                'judul' => 'Pengalaman Pertama Mengikuti Olimpiade Matematika',
                'isi' => 'Hari itu adalah hari yang sangat berkesan bagi saya. Sebagai siswa kelas XI, saya mendapat kesempatan untuk mengikuti Olimpiade Matematika tingkat kabupaten. Persiapan yang saya lakukan cukup intensif, mulai dari belajar soal-soal tahun sebelumnya hingga mengikuti bimbingan khusus.

Saat hari pelaksanaan tiba, perasaan gugup dan excited bercampur menjadi satu. Soal-soal yang diberikan memang cukup menantang, namun berkat persiapan yang matang, saya bisa mengerjakan sebagian besar dengan baik.

Yang paling berkesan adalah saat pengumuman hasil. Meskipun tidak meraih juara pertama, saya berhasil masuk 10 besar dan mendapat sertifikat penghargaan. Pengalaman ini mengajarkan saya bahwa usaha keras tidak akan mengkhianati hasil.

Bagi teman-teman yang ingin mengikuti olimpiade, jangan takut untuk mencoba. Persiapkan diri dengan baik dan percaya pada kemampuan sendiri!',
                'status' => 'draft',
            ],
            [
                'judul' => 'Keseruan Festival Budaya Sekolah Tahun Ini',
                'isi' => 'Festival Budaya tahunan sekolah kita kembali digelar dengan meriah! Acara yang berlangsung selama tiga hari ini menampilkan berbagai pertunjukan dari setiap kelas.

Kelas kami memilih untuk menampilkan tarian tradisional Saman dari Aceh. Persiapan yang kami lakukan cukup panjang, mulai dari latihan gerakan, menyiapkan kostum, hingga menghafal lagu pengiring.

Hari pertama dibuka dengan parade kostum tradisional dari berbagai daerah. Setiap kelas berlomba menampilkan yang terbaik. Ada yang mengenakan kebaya Jawa, baju adat Minang, pakaian adat Papua, dan masih banyak lagi.

Hari kedua adalah puncak acara dengan pertunjukan di panggung utama. Antusiasme penonton sangat tinggi, terutama saat penampilan tarian dan musik tradisional. Suasana semakin meriah dengan adanya stand makanan khas daerah.

Acara ditutup dengan pengumuman pemenang dan foto bersama. Meskipun kelas kami tidak menang, pengalaman berharga ini tidak akan terlupakan. Festival ini benar-benar mempererat persaudaraan antar siswa!',
                'status' => 'draft',
            ],
            [
                'judul' => 'Tips Belajar Efektif untuk Persiapan Ujian',
                'isi' => 'Ujian semester sudah di depan mata, dan banyak teman-teman yang mulai panik. Sebagai siswa yang pernah merasakan hal yang sama, saya ingin berbagi tips belajar yang efektif.

Pertama, buat jadwal belajar yang realistis. Jangan memaksakan diri untuk belajar 12 jam sehari karena justru akan membuat otak lelah. Bagi waktu belajar menjadi sesi-sesi kecil dengan istirahat di antaranya.

Kedua, gunakan teknik Pomodoro. Belajar selama 25 menit, lalu istirahat 5 menit. Setelah 4 siklus, ambil istirahat panjang 15-30 menit. Teknik ini terbukti meningkatkan konsentrasi.

Ketiga, buat catatan ringkas atau mind map. Cara ini membantu otak mengingat informasi dengan lebih baik karena melibatkan visualisasi.

Keempat, jangan lupa untuk tidur yang cukup. Begadang justru akan menurunkan daya ingat dan konsentrasi. Tidur 7-8 jam per hari sangat penting untuk performa otak.

Terakhir, jangan stress berlebihan. Lakukan aktivitas yang menyenangkan di sela-sela belajar seperti olahraga ringan atau mendengarkan musik.

Semoga tips ini bermanfaat untuk teman-teman semua. Semangat belajar!',
                'status' => 'draft',
            ],
            [
                'judul' => 'Refleksi Kegiatan Bakti Sosial di Panti Asuhan',
                'isi' => 'Minggu lalu, OSIS sekolah kita mengadakan kegiatan bakti sosial ke Panti Asuhan Kasih Sayang. Sebagai salah satu peserta, saya ingin berbagi pengalaman yang sangat menyentuh hati.

Kami berangkat pagi-pagi dengan membawa berbagai donasi seperti buku, alat tulis, makanan, dan pakaian yang telah dikumpulkan dari seluruh siswa sekolah. Antusiasme teman-teman sangat tinggi untuk membantu sesama.

Sesampainya di panti asuhan, kami disambut hangat oleh pengurus dan anak-anak yang tinggal di sana. Mata mereka berbinar-binar melihat kedatangan kami. Kepolosan dan kegembiraan mereka benar-benar menular.

Kegiatan dimulai dengan serah terima donasi, dilanjutkan dengan bermain bersama anak-anak. Kami mengajarkan mereka berbagai permainan edukatif dan membantu mengerjakan PR. Yang mengharukan adalah ketika mereka bercerita tentang cita-cita mereka dengan penuh semangat.

Saat waktu pulang tiba, banyak dari kami yang tidak rela berpisah. Anak-anak panti juga terlihat sedih dan meminta kami untuk datang lagi. Pengalaman ini mengajarkan saya untuk lebih bersyukur dan peduli terhadap sesama.

Kegiatan bakti sosial ini tidak hanya memberikan manfaat bagi penerima, tetapi juga bagi kami sebagai pemberi. Semoga kegiatan seperti ini bisa terus dilakukan secara rutin.',
                'status' => 'draft',
            ],
            [
                'judul' => 'Inovasi Hidroponik di Kebun Sekolah',
                'isi' => 'Tahun ini sekolah kita memulai program inovasi pertanian dengan sistem hidroponik. Sebagai anggota ekstrakurikuler KIR (Karya Ilmiah Remaja), saya berkesempatan terlibat langsung dalam proyek ini.

Hidroponik adalah metode bercocok tanam tanpa menggunakan tanah, melainkan dengan larutan nutrisi. Sistem ini sangat cocok diterapkan di sekolah karena tidak membutuhkan lahan yang luas dan lebih bersih.

Kami memulai dengan menanam sayuran sederhana seperti selada, kangkung, dan bayam. Prosesnya dimulai dari penyemaian benih, pembuatan larutan nutrisi, hingga perawatan tanaman setiap hari.

Yang menarik adalah melihat pertumbuhan tanaman yang sangat cepat dibandingkan dengan cara konvensional. Dalam waktu 3-4 minggu, sayuran sudah bisa dipanen. Hasilnya pun lebih segar dan bebas pestisida.

Proyek ini tidak hanya mengajarkan kami tentang pertanian modern, tetapi juga tentang kerjasama tim dan tanggung jawab. Setiap anggota memiliki tugas masing-masing dalam merawat tanaman.

Hasil panen kami jual ke kantin sekolah dan sebagian dibagikan ke guru-guru. Keuntungannya digunakan untuk mengembangkan sistem hidroponik yang lebih besar.

Ke depannya, kami berencana untuk mengembangkan sistem aquaponik yang menggabungkan budidaya ikan dan tanaman. Semoga proyek ini bisa menginspirasi sekolah lain untuk mengembangkan pertanian berkelanjutan.',
                'status' => 'draft',
            ]
        ];

        foreach ($draftArticles as $articleData) {
            Article::create([
                'judul' => $articleData['judul'],
                'isi' => $articleData['isi'],
                'tanggal' => now()->subDays(rand(1, 7))->toDateString(),
                'id_user' => $siswa->id,
                'id_kategori' => $categories->random()->id,
                'status' => $articleData['status'],
            ]);
        }
    }
}