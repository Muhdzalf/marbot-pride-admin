<?php

namespace App\Http\Livewire;

use App\Models\Program;
use Livewire\Component;

class DetailProgram extends Component
{
    public $program;
    public $programId;

    public function mount()
    {
        $this->program = Program::find($this->programId);
    }

    public function render()
    {
        return view('livewire.detail-program');
    }
}
