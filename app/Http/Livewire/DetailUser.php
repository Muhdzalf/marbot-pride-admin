<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class DetailUser extends Component
{
    public $user;
    public $userId;

    public function mount()
    {
        $this->user = User::find($this->userId);
    }
    public function render()
    {
        return view('livewire.detail-user');
    }
}
