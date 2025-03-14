<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Carbon;
use stdClass;

class Services extends Component
{
    public function getDummyAnnouncements()
    {
        $announcements = [];

        for ($i = 1; $i <= 3; $i++) {
            $announcement = new stdClass();
            $announcement->id = $i;
            $announcement->title = "Pengumuman Penting #$i: " . $this->getRandomTitle('announcement');
            $announcement->content = $this->getRandomContent();
            $announcement->published_at = Carbon::now()->subDays(rand(1, 30))->format('Y-m-d H:i:s');
            $announcements[] = $announcement;
        }

        return collect($announcements);
    }

    public function getDummyNews()
    {
        $news = [];

        for ($i = 1; $i <= 6; $i++) {
            $newsItem = new stdClass();
            $newsItem->id = $i;
            $newsItem->title = "Berita #$i: " . $this->getRandomTitle('news');
            $newsItem->content = $this->getRandomContent();
            $newsItem->published_at = Carbon::now()->subDays(rand(1, 60))->format('Y-m-d H:i:s');
            $news[] = $newsItem;
        }

        return collect($news);
    }

    private function getRandomTitle($type)
    {
        $announcementTitles = [
            'Perubahan Jam Operasional Disdukcapil Selama Masa Pandemi',
            'Jadwal Pelayanan Khusus Pembuatan KTP',
            'Pengumuman Pelayanan Online e-KTP dan Akta',
            'Informasi Perpanjangan Masa Berlaku KTP Elektronik',
            'Kebijakan Baru Pencatatan Akta Kelahiran',
            'Pengumuman Pelayanan Terpadu Pembuatan Dokumen Kependudukan'
        ];

        $newsTitles = [
            'Disdukcapil Luncurkan Layanan Pembuatan Dokumen via Aplikasi',
            'Layanan Drive-Thru KTP Elektronik Resmi Dibuka',
            'Peningkatan Pelayanan Publik Disdukcapil Mendapat Apresiasi',
            'Kunjungan Kerja Menteri Dalam Negeri ke Disdukcapil',
            'Disdukcapil Tingkatkan Digitalisasi Layanan Publik',
            'Peresmian Gedung Baru Disdukcapil untuk Pelayanan Prima'
        ];

        $titles = $type === 'announcement' ? $announcementTitles : $newsTitles;
        return $titles[array_rand($titles)];
    }

    private function getRandomContent()
    {
        $paragraphs = [
            'Dinas Kependudukan dan Pencatatan Sipil terus berkomitmen untuk memberikan pelayanan terbaik kepada masyarakat dalam pengurusan dokumen kependudukan. Berbagai inovasi dilakukan untuk memudahkan masyarakat dalam mengakses layanan administrasi kependudukan.',
            'Sebagai upaya meningkatkan kualitas pelayanan publik, Disdukcapil mengembangkan sistem pelayanan terpadu yang terintegrasi. Hal ini bertujuan untuk mempercepat proses pengurusan dokumen dan mengurangi beban administratif bagi masyarakat.',
            'Masyarakat diharapkan untuk selalu memperhatikan persyaratan dan prosedur yang berlaku dalam pengurusan dokumen kependudukan. Kelengkapan dokumen dan data yang akurat akan mempercepat proses pelayanan.',
            'Dalam rangka mendukung program pemerintah, Disdukcapil menerapkan protokol kesehatan yang ketat selama proses pelayanan. Hal ini untuk memastikan keamanan dan kenyamanan baik petugas maupun masyarakat yang mengurus dokumen.',
            'Pemanfaatan teknologi informasi dalam pelayanan publik terus dikembangkan oleh Disdukcapil. Inovasi digital ini diharapkan dapat meningkatkan efisiensi dan efektivitas dalam pengurusan dokumen kependudukan.'
        ];

        return $paragraphs[array_rand($paragraphs)];
    }

    public function render()
    {
        return view('livewire.pages.services', [
            'news' => $this->getDummyNews(),
            'announcements' => $this->getDummyAnnouncements()
        ]);
    }
}
