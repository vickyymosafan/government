<?php

namespace App\Http\Livewire\Pages;

use App\Models\Announcement;
use Livewire\Component;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AnnouncementDetail extends Component
{
    public $announcementId;
    public $announcement;
    public $error = false;
    
    public function mount($id)
    {
        $this->announcementId = $id;
        $this->loadAnnouncement();
    }
    
    public function loadAnnouncement()
    {
        try {
            $this->announcement = Announcement::findOrFail($this->announcementId);
        } catch (ModelNotFoundException $e) {
            $this->error = true;
        }
    }
    
    public function render()
    {
        return view('livewire.pages.announcement-detail');
    }
}
