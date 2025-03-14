<?php

namespace App\Http\Livewire\Pages;

use App\Models\News;
use App\Models\Announcement;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $news = News::published()
            ->latest('published_at')
            ->take(5)
            ->get();

        $announcements = Announcement::active()
            ->latest('start_date')
            ->get();

        return view('livewire.pages.home', [
            'news' => $news,
            'announcements' => $announcements,
        ]);
    }
}
