<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Donation;
use App\Models\KajianVideo;
use App\Models\Program;
use App\Models\User;
use App\Models\Ustadz;
use Livewire\Component;

class DashboardSummary extends Component
{
    public $user;
    public $admin;
    public $ustadz;
    public $donation;
    public $program;
    public $video;

    public function mount()
    {
        $this->user = User::query()->where('role', '=', 'user')->count();
        $this->admin = User::query()->where('role', '=', 'admin')->count();
        $this->ustadz = Ustadz::query()->count();
        $this->program = Program::query()->count();
        $this->donation = Donation::query()->sum('donation');
        $this->video = KajianVideo::query()->count();
    }
    public function render()
    {
        return view('livewire.dashboard.dashboard-summary');
    }
}
