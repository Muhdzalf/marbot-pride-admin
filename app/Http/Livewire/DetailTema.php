<?php

namespace App\Http\Livewire;

use App\Models\KajianTheme;
use Livewire\Component;

class DetailTema extends Component
{
    public $tema;
    public $temaId;

    public function mount()
    {
        $this->tema = KajianTheme::find($this->temaId);
    }

    public function render()
    {
        return view('livewire.detail-tema');
    }
}
