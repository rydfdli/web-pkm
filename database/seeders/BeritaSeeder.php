<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan ada user untuk author
        $user = User::first();
        if (!$user) {
            $user = User::create([
                'name' => 'Admin Puskesmas',
                'email' => 'admin@puskesmassentosa.go.id',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]);
        }

        $beritas = [
            // Featured News
            [
                'judul' => 'Puskesmas Sehat Sentosa Raih Akreditasi Paripurna',
                'excerpt' => 'Dalam upaya meningkatkan kualitas pelayanan kesehatan, Puskesmas Sehat Sentosa berhasil meraih akreditasi paripurna dari Komisi Akreditasi Fasilitas Kesehatan Tingkat Pertama (KAFKTP).',
                'isi' => '<p>Dalam upaya meningkatkan kualitas pelayanan kesehatan, Puskesmas Sehat Sentosa berhasil meraih akreditasi paripurna dari Komisi Akreditasi Fasilitas Kesehatan Tingkat Pertama (KAFKTP). Pencapaian ini menunjukkan komitmen kami dalam memberikan pelayanan kesehatan yang berkualitas dan berstandar nasional.</p><p>Akreditasi ini diperoleh setelah melalui proses penilaian yang ketat terhadap berbagai aspek pelayanan, mulai dari manajemen organisasi, pelayanan medis, hingga keselamatan pasien. Tim assessor KAFKTP melakukan evaluasi menyeluruh selama tiga hari untuk memastikan semua standar terpenuhi.</p><p>Kepala Puskesmas Sehat Sentosa, dr. Ahmad Setiawan, M.Kes, menyampaikan rasa syukur dan bangga atas pencapaian ini. "Akreditasi paripurna ini adalah hasil kerja keras seluruh tim Puskesmas. Kami berkomitmen untuk terus meningkatkan kualitas pelayanan demi kesehatan masyarakat," ujarnya.</p>',
                'kategori' => 'pengumuman',
                'is_featured' => true,
                'tags' => ['akreditasi', 'kualitas', 'pelayanan', 'kafktp'],
                'views_count' => 1250,
                'published_at' => Carbon::now()->subDays(1),
            ],

            // Regular News
            [
                'judul' => 'Kegiatan Posyandu Balita Bulan Juli',
                'excerpt' => 'Posyandu balita dilaksanakan setiap hari Rabu minggu ke-2 setiap bulan untuk pemantauan tumbuh kembang balita dengan agenda penimbangan, pengukuran, dan edukasi gizi.',
                'isi' => '<p>Kegiatan Posyandu balita untuk bulan Juli telah dilaksanakan pada hari Rabu, 10 Juli 2025 di halaman Puskesmas Sehat Sentosa. Kegiatan ini rutin dilakukan setiap hari Rabu minggu ke-2 setiap bulan sebagai bagian dari program pemantauan tumbuh kembang balita.</p><p>Agenda kegiatan meliputi penimbangan berat badan, pengukuran tinggi badan, pemeriksaan kesehatan umum, dan edukasi gizi untuk para orang tua. Pada kegiatan kali ini, tercatat 45 balita yang hadir untuk diperiksa.</p><p>Kader kesehatan masyarakat juga memberikan penyuluhan tentang pentingnya ASI eksklusif dan makanan pendamping ASI yang tepat. Para orang tua tampak antusias mengikuti sesi tanya jawab seputar gizi dan kesehatan anak.</p>',
                'kategori' => 'kegiatan',
                'is_featured' => false,
                'tags' => ['posyandu', 'balita', 'gizi', 'tumbuh-kembang'],
                'views_count' => 890,
                'published_at' => Carbon::now()->subDays(3),
            ],

            [
                'judul' => 'Program Pemeriksaan Gigi Gratis',
                'excerpt' => 'Dalam rangka memperingati Hari Kesehatan Nasional, Puskesmas Sehat Sentosa menyelenggarakan program pemeriksaan gigi gratis untuk seluruh masyarakat.',
                'isi' => '<p>Dalam rangka memperingati Hari Kesehatan Nasional, Puskesmas Sehat Sentosa menyelenggarakan program pemeriksaan gigi gratis untuk seluruh masyarakat. Program ini berlangsung selama satu minggu penuh dari tanggal 15-22 Juli 2025.</p><p>Layanan yang tersedia meliputi pemeriksaan gigi rutin, pembersihan karang gigi, konsultasi kesehatan gigi dan mulut, serta edukasi cara menyikat gigi yang benar. Program ini diharapkan dapat meningkatkan kesadaran masyarakat akan pentingnya menjaga kesehatan gigi dan mulut.</p><p>drg. Maria Sari, dokter gigi Puskesmas, mengatakan bahwa kesehatan gigi dan mulut sangat penting untuk kesehatan tubuh secara keseluruhan. "Kami mengajak seluruh masyarakat untuk memanfaatkan program gratis ini. Deteksi dini masalah gigi dapat mencegah komplikasi yang lebih serius," jelasnya.</p>',
                'kategori' => 'program',
                'is_featured' => false,
                'tags' => ['gigi', 'gratis', 'kesehatan', 'hari-kesehatan-nasional'],
                'views_count' => 654,
                'published_at' => Carbon::now()->subDays(5),
            ],

            [
                'judul' => 'Penyuluhan Gizi Seimbang untuk Remaja',
                'excerpt' => 'Program edukasi gizi seimbang untuk pelajar SMP dan SMA di wilayah kerja Puskesmas guna mendukung pertumbuhan dan perkembangan optimal remaja.',
                'isi' => '<p>Puskesmas Sehat Sentosa mengadakan program penyuluhan gizi seimbang untuk remaja yang diikuti oleh 120 pelajar dari 3 sekolah di wilayah kerja Puskesmas. Kegiatan ini bertujuan untuk memberikan edukasi tentang pentingnya gizi seimbang dalam masa pertumbuhan remaja.</p><p>Materi penyuluhan meliputi prinsip gizi seimbang, dampak kekurangan gizi pada remaja, bahaya junk food, dan tips memilih makanan sehat. Para siswa juga diajak untuk praktek langsung membuat menu makanan sehat dengan bahan-bahan yang mudah didapat.</p><p>Ns. Dewi Lestari, S.Kep, koordinator program promosi kesehatan, menekankan bahwa masa remaja adalah periode kritis pertumbuhan. "Gizi yang baik di masa remaja akan menentukan kualitas kesehatan di masa dewasa. Kami berharap para remaja dapat menerapkan pola makan sehat sejak dini," ujarnya.</p>',
                'kategori' => 'edukasi',
                'is_featured' => false,
                'tags' => ['gizi', 'remaja', 'edukasi', 'sekolah'],
                'views_count' => 432,
                'published_at' => Carbon::now()->subDays(7),
            ],

            [
                'judul' => 'Update Program Vaksinasi COVID-19',
                'excerpt' => 'Puskesmas Sehat Sentosa menyediakan vaksin booster COVID-19 untuk semua kelompok usia. Pendaftaran dapat dilakukan melalui aplikasi PeduliLindungi atau datang langsung.',
                'isi' => '<p>Puskesmas Sehat Sentosa terus melanjutkan program vaksinasi COVID-19 dengan menyediakan vaksin booster untuk semua kelompok usia. Vaksinasi dilakukan setiap hari Senin hingga Jumat mulai pukul 08.00-12.00 WIB.</p><p>Masyarakat dapat mendaftar melalui aplikasi PeduliLindungi atau datang langsung ke Puskesmas dengan membawa KTP dan kartu vaksinasi sebelumnya. Untuk vaksin booster kedua, jarak minimal 6 bulan dari vaksin booster pertama.</p><p>dr. Budi Santoso, penanggung jawab program vaksinasi, mengimbau masyarakat untuk tetap melengkapi vaksinasi sesuai jadwal. "Vaksinasi booster penting untuk mempertahankan kekebalan tubuh terhadap COVID-19, terutama menghadapi varian-varian baru yang terus bermunculan," jelasnya.</p>',
                'kategori' => 'program',
                'is_featured' => false,
                'tags' => ['vaksinasi', 'covid-19', 'booster', 'pedulilindungi'],
                'views_count' => 789,
                'published_at' => Carbon::now()->subDays(8),
            ],

            [
                'judul' => 'Senam Sehat Bersama Lansia',
                'excerpt' => 'Kegiatan senam sehat untuk lansia dilaksanakan setiap hari Jumat pagi di halaman Puskesmas dengan instruktur berpengalaman untuk menjaga kebugaran lansia.',
                'isi' => '<p>Setiap hari Jumat pagi, halaman Puskesmas Sehat Sentosa dipenuhi dengan para lansia yang mengikuti kegiatan senam sehat. Program ini telah berjalan selama 2 tahun dan diikuti oleh rata-rata 30-40 peserta setiap minggunya.</p><p>Senam lansia ini dipandu oleh instruktur berpengalaman dan disesuaikan dengan kondisi fisik lansia. Gerakan-gerakan yang diajarkan fokus pada peregangan, keseimbangan, dan penguatan otot dengan intensitas ringan hingga sedang.</p><p>Ibu Siti (65 tahun), salah satu peserta rutin, mengaku merasakan manfaat yang besar. "Setelah rutin senam, badan terasa lebih segar dan tidur malam jadi lebih nyenyak. Kami juga jadi punya teman-teman baru di sini," ujarnya dengan tersenyum.</p>',
                'kategori' => 'kegiatan',
                'is_featured' => false,
                'tags' => ['senam', 'lansia', 'kebugaran', 'olahraga'],
                'views_count' => 345,
                'published_at' => Carbon::now()->subDays(10),
            ],

            [
                'judul' => 'Pelatihan Kader Kesehatan Masyarakat',
                'excerpt' => 'Pelatihan untuk meningkatkan kapasitas kader kesehatan dalam memberikan edukasi dan pendampingan kesehatan masyarakat di tingkat RT/RW.',
                'isi' => '<p>Puskesmas Sehat Sentosa mengadakan pelatihan kader kesehatan masyarakat yang diikuti oleh 25 kader dari berbagai kelurahan di wilayah kerja. Pelatihan ini bertujuan untuk meningkatkan kapasitas kader dalam memberikan edukasi dan pendampingan kesehatan di tingkat RT/RW.</p><p>Materi pelatihan meliputi pengenalan penyakit tidak menular, cara mengukur tekanan darah dan gula darah, pertolongan pertama pada kecelakaan, dan teknik komunikasi efektif dalam penyuluhan kesehatan.</p><p>Kepala Puskesmas menyampaikan apresiasi kepada para kader yang telah berkomitmen menjadi mitra dalam meningkatkan derajat kesehatan masyarakat. "Kader kesehatan adalah ujung tombak pelayanan kesehatan di masyarakat. Melalui pelatihan ini, diharapkan mereka dapat memberikan kontribusi yang lebih optimal," katanya.</p>',
                'kategori' => 'info',
                'is_featured' => false,
                'tags' => ['pelatihan', 'kader', 'kesehatan-masyarakat', 'kapasitas'],
                'views_count' => 567,
                'published_at' => Carbon::now()->subDays(12),
            ],

            [
                'judul' => 'Peluncuran Program Deteksi Dini Diabetes',
                'excerpt' => 'Program baru untuk deteksi dini diabetes melitus dengan pemeriksaan gula darah gratis bagi masyarakat berusia 30 tahun ke atas.',
                'isi' => '<p>Puskesmas Sehat Sentosa meluncurkan program deteksi dini diabetes melitus sebagai upaya pencegahan dan pengendalian penyakit tidak menular. Program ini menyediakan pemeriksaan gula darah gratis bagi masyarakat berusia 30 tahun ke atas.</p><p>Pemeriksaan dilakukan setiap hari Kamis pukul 07.00-10.00 WIB dengan metode gula darah sewaktu (GDS) dan gula darah puasa (GDP). Masyarakat yang ingin mengikuti pemeriksaan GDP dianjurkan untuk puasa minimal 8 jam.</p><p>Program ini dilatarbelakangi oleh tingginya prevalensi diabetes di Indonesia dan pentingnya deteksi dini untuk mencegah komplikasi. "Diabetes sering tidak menunjukkan gejala pada tahap awal, sehingga deteksi dini sangat penting untuk penanganan yang tepat," jelas dr. Ahmad Setiawan.</p>',
                'kategori' => 'program',
                'is_featured' => false,
                'tags' => ['diabetes', 'deteksi-dini', 'gula-darah', 'gratis'],
                'views_count' => 678,
                'published_at' => Carbon::now()->subDays(15),
            ],

            [
                'judul' => 'Workshop Kesehatan Mental untuk Remaja',
                'excerpt' => 'Workshop khusus untuk remaja tentang kesehatan mental, mengatasi stres, dan pentingnya support system dalam menghadapi tekanan hidup.',
                'isi' => '<p>Mengingat pentingnya kesehatan mental remaja, Puskesmas Sehat Sentosa mengadakan workshop kesehatan mental yang diikuti oleh 80 remaja dari berbagai sekolah. Workshop ini bertujuan untuk memberikan edukasi tentang kesehatan mental dan cara mengatasi berbagai tekanan hidup.</p><p>Materi workshop meliputi pengenalan kesehatan mental, cara mengelola stres dan emosi, pentingnya support system, dan kapan harus mencari bantuan profesional. Sesi interaktif juga diadakan untuk memberikan ruang bagi remaja untuk berbagi pengalaman.</p><p>Psikolog klinis yang menjadi narasumber menekankan bahwa kesehatan mental sama pentingnya dengan kesehatan fisik. "Remaja perlu memahami bahwa mencari bantuan untuk masalah mental bukanlah hal yang memalukan, tetapi tindakan yang bijak dan berani," jelasnya.</p>',
                'kategori' => 'edukasi',
                'is_featured' => false,
                'tags' => ['kesehatan-mental', 'remaja', 'stres', 'workshop'],
                'views_count' => 456,
                'published_at' => Carbon::now()->subDays(18),
            ],

            [
                'judul' => 'Kampanye Hidup Sehat Tanpa Rokok',
                'excerpt' => 'Kampanye berkelanjutan untuk meningkatkan kesadaran masyarakat tentang bahaya rokok dan mendukung upaya berhenti merokok.',
                'isi' => '<p>Puskesmas Sehat Sentosa meluncurkan kampanye "Hidup Sehat Tanpa Rokok" sebagai bagian dari upaya pengendalian tembakau di wilayah kerja. Kampanye ini melibatkan berbagai kegiatan edukasi dan konseling untuk membantu perokok yang ingin berhenti.</p><p>Kegiatan kampanye meliputi penyuluhan di sekolah-sekolah, tempat kerja, dan tempat ibadah tentang bahaya rokok bagi kesehatan. Tersedia juga layanan konseling berhenti merokok setiap hari Selasa dan Kamis pukul 14.00-16.00 WIB.</p><p>Data menunjukkan bahwa 35% laki-laki dewasa di wilayah kerja Puskesmas masih merokok. "Melalui kampanye ini, kami berharap dapat menurunkan angka perokok dan menciptakan lingkungan yang lebih sehat untuk semua," ujar koordinator program pengendalian tembakau.</p>',
                'kategori' => 'kegiatan',
                'is_featured' => false,
                'tags' => ['anti-rokok', 'kampanye', 'berhenti-merokok', 'hidup-sehat'],
                'views_count' => 723,
                'published_at' => Carbon::now()->subDays(20),
            ],

            [
                'judul' => 'Pembagian Vitamin A untuk Balita',
                'excerpt' => 'Program rutin pembagian vitamin A untuk balita usia 6-59 bulan sebagai upaya pencegahan kekurangan vitamin A dan peningkatan daya tahan tubuh.',
                'isi' => '<p>Puskesmas Sehat Sentosa melaksanakan program pembagian vitamin A untuk balita usia 6-59 bulan sesuai dengan program nasional penanggulangan kekurangan vitamin A. Kegiatan ini dilaksanakan pada bulan Februari dan Agustus setiap tahunnya.</p><p>Vitamin A diberikan dalam bentuk kapsul dengan dosis sesuai usia anak. Balita usia 6-11 bulan mendapat vitamin A dosis 100.000 IU (kapsul biru), sedangkan balita usia 12-59 bulan mendapat dosis 200.000 IU (kapsul merah).</p><p>Program ini sangat penting untuk mencegah kebutaan pada anak, meningkatkan daya tahan tubuh, dan menurunkan angka kesakitan serta kematian balita. Orang tua diimbau untuk membawa balitanya ke Puskesmas atau Posyandu terdekat untuk mendapatkan vitamin A gratis.</p>',
                'kategori' => 'program',
                'is_featured' => false,
                'tags' => ['vitamin-a', 'balita', 'gizi', 'imunitas'],
                'views_count' => 389,
                'published_at' => Carbon::now()->subDays(25),
            ],
        ];

        foreach ($beritas as $beritaData) {
            Berita::create([
                'judul' => $beritaData['judul'],
                'slug' => Str::slug($beritaData['judul']),
                'excerpt' => $beritaData['excerpt'],
                'isi' => $beritaData['isi'],
                'kategori' => $beritaData['kategori'],
                'is_featured' => $beritaData['is_featured'],
                'is_published' => true,
                'published_at' => $beritaData['published_at'],
                'tags' => $beritaData['tags'],
                'views_count' => $beritaData['views_count'],
                'user_id' => $user->id,
                'meta_description' => Str::limit(strip_tags($beritaData['excerpt']), 160),
            ]);
        }
    }
}