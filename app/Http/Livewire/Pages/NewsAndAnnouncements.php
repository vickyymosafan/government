<?php

declare(strict_types=1);

namespace App\Http\Livewire\Pages;

use App\Models\News;
use App\Models\Announcement;
use Livewire\Component;
use Illuminate\Support\Collection;

class NewsAndAnnouncements extends Component
{
    /**
     * Get the latest published news
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLatestNews()
    {
        return News::published()
            ->latest('published_at')
            ->take(3)
            ->get();
    }

    /**
     * Get active announcements
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getActiveAnnouncements()
    {
        return Announcement::active()
            ->orderBy('start_date', 'desc')
            ->get()
            ->map(function ($item) {
                // Ensure all required fields are present
                if (!isset($item->type)) {
                    $item->type = 'info'; // Default type if not set
                }
                return $item;
            });
    }

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $announcements = $this->getActiveAnnouncements();
        $news = $this->getLatestNews();
        
        return view('livewire.pages.news-and-announcements', [
            'news' => $news,
            'announcements' => $announcements,
        ]);
    }
}
