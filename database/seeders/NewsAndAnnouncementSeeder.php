<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Announcement;
use Illuminate\Database\Seeder;

class NewsAndAnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        // Create dummy news
        $news = [
            [
                'title' => 'Peluncuran Sistem e-KTP Online',
                'content' => 'Disdukcapil meluncurkan sistem pendaftaran e-KTP secara online untuk memudahkan masyarakat dalam mengurus dokumen kependudukan.',
                'image' => 'https://placehold.co/600x400/png',
                'published_at' => '2025-02-26 10:00:00',
                'status' => 'published',
            ],
            [
                'title' => 'Jadwal Pelayanan Akhir Tahun',
                'content' => 'Informasi mengenai jadwal pelayanan Disdukcapil selama periode libur akhir tahun 2024.',
                'image' => 'https://placehold.co/600x400/png',
                'published_at' => '2025-02-25 14:30:00',
                'status' => 'published',
            ],
            [
                'title' => 'Program Jemput Bola KTP Elektronik',
                'content' => 'Disdukcapil mengadakan program jemput bola pembuatan KTP Elektronik untuk masyarakat di daerah terpencil.',
                'image' => 'https://placehold.co/600x400/png',
                'published_at' => '2025-02-24 09:15:00',
                'status' => 'published',
            ],
        ];

        foreach ($news as $item) {
            News::create($item);
        }

        // Create dummy announcements
        $announcements = [
            [
                'title' => 'Pembaruan Sistem Pelayanan',
                'content' => 'Pada tanggal 1-2 Maret 2025, akan dilakukan pembaruan sistem. Mohon maaf atas ketidaknyamanannya.',
                'type' => 'warning',
                'active' => true,
                'start_date' => '2025-02-26',
                'end_date' => '2025-03-02',
            ],
            [
                'title' => 'Persyaratan Baru Pembuatan KTP',
                'content' => 'Mulai 15 Maret 2025, terdapat persyaratan tambahan untuk pembuatan KTP. Silakan cek detail di kantor Disdukcapil terdekat.',
                'type' => 'info',
                'active' => true,
                'start_date' => '2025-02-26',
                'end_date' => '2025-03-15',
            ],
            [
                'title' => 'Layanan Online 24 Jam',
                'content' => 'Disdukcapil telah mengaktifkan layanan online 24 jam untuk beberapa jenis pelayanan. Silakan akses melalui website resmi.',
                'type' => 'success',
                'active' => true,
                'start_date' => '2025-02-26',
                'end_date' => '2025-04-01',
            ],
        ];

        foreach ($announcements as $item) {
            Announcement::create($item);
        }
    }
}
