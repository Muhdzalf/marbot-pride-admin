<?php

namespace App\Http\Livewire;

use App\Models\Program;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProgram extends Component
{
    public $program;
    public $programId;
    public $action;
    public $button;
    public $poster;

    use WithFileUploads;

    public function getRules()
    {
        $rules = ($this->action == "updateProgram") ? [
            'program.name' => 'required|max:50' . $this->programId
        ] : [
            'program.target_donation' => 'required'
        ];

        return array_merge([
            'program.name' => 'required|max:50',
            'program.description' => 'required|max:225',
            'program.target_donation' => 'required',
            'program.poster_url' => 'nullable'
        ], $rules);
    }

    public function createProgram()
    {
        $this->resetErrorBag();
        $this->validate();

        Program::create([
            'name' => $this->program['name'],
            'description' => $this->program['description'],
            'target_donation' => $this->program['target_donation'],
            'admin_id' => Auth::user()->id
        ]);

        $this->emit('saved');
        $this->emit('program');
    }

    public function updateProgram()
    {
        $this->resetErrorBag();
        $this->validate();

        if (!empty($this->poster)) {
            $this->poster->store('poster-program', 'public');

            Program::query()->where('id', $this->programId)->update(
                [
                    'name' => $this->program->name,
                    'description' => $this->program->description,
                    'target_donation' => $this->program->target_donation,
                    'poster_url' => $this->poster->hashName(),
                ]
            );
        } else {
            Program::query()->where('id', $this->programId)->update(
                [
                    'name' => $this->program->name,
                    'description' => $this->program->description,
                    'target_donation' => $this->program->target_donation,
                ]
            );
        }

        $this->emit('saved');
    }

    public function mount()
    {
        if (!$this->program && $this->programId) {
            $this->program = Program::find($this->programId);
        }

        $this->button = create_button($this->action, "Program");
    }

    public function deletePoster()
    {
        Storage::delete('public/poster-program' . '/' . $this->program['poster_rl']);
        $this->program['poster_rl'] = null;
        $this->program->save();
    }
    public function render()
    {
        return view('livewire.create-program');
    }
}
