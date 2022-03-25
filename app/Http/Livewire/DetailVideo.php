<?php

namespace App\Http\Livewire;

use App\Models\Donation;
use App\Models\KajianVideo;
use Livewire\Component;

class DetailVideo extends Component
{
    public $video;
    public $videoId;

    public function mount()
    {
        $this->video = KajianVideo::find($this->videoId);
    }


    public function render()
    {
        return view('livewire.detail-video');
    }
}
