<?php

namespace App\Http\Livewire;

use App\Models\Ustadz;
use Livewire\Component;


class DetailUstadz extends Component
{
    public $ustadz;
    public $ustadzId;

    public function mount()
    {
        $this->ustadz = Ustadz::find($this->ustadzId);
    }

    public function render()
    {
        return view('livewire.detail-ustadz');
    }
}
