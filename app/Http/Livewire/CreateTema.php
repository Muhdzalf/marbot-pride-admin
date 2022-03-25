<?php

namespace App\Http\Livewire;

use App\Models\KajianTheme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateTema extends Component
{
    public $tema;
    public $temaId;
    public $action;
    public $button;
    public $poster;
    public $tags;

    use WithFileUploads;

    public function getRules()
    {
        $rules = ($this->action == "updateTema") ? [
            'tema.title' => 'required|max:50' . $this->temaId,
        ] : ['tema.description' => 'required|max:225'];

        return array_merge([
            'tema.title' => 'required|max:50',
            'tema.description' => 'required|max:225',
            'tema.tag' => 'nullable',
        ], $rules);
    }

    public function createTema()
    {
        $this->resetErrorBag();
        $this->validate();

        $this->poster->store('poster-tema', 'public');


        KajianTheme::create([
            'title' => $this->tema['title'],
            'description' => $this->tema['description'],
            'poster_url' => $this->poster->hasName(),
            'tag' => $this->tema['tag'],
            'admin_id' => Auth::user()->id
        ]);

        $this->emit('saved');
        $this->emit('tema');
    }

    public function updateTema()
    {
        $this->resetErrorBag();
        $this->validate();

        if (!empty($this->poster)) {
            $this->poster->store('poster-tema', 'public');
            KajianTheme::query()->where('id', $this->temaId)->update(
                [
                    'title' => $this->tema->title,
                    'description' => $this->tema->description,
                    'poster_url' => $this->poster->hashName(),
                    'tag' => $this->tema->tag
                ]
            );
        } else {
            KajianTheme::query()->where('id', $this->temaId)->update(
                [
                    'title' => $this->tema->title,
                    'description' => $this->tema->description,
                    'tag' => $this->tema->tag
                ]
            );
        }



        $this->emit('saved');
    }

    public function deletePoster()
    {

        Storage::delete('public/poster-tema' . '/' . $this->tema['poster_url']);
        $this->tema['poster_url'] = null;
        $this->tema->save();
    }

    public function mount()
    {
        if (!$this->tema && $this->temaId) {
            $this->tema = KajianTheme::find($this->temaId);
        }

        $this->tags = ['none', 'trending', 'new', 'popular'];
        $this->button = create_button($this->action, "tema");
    }

    public function render()
    {
        return view('livewire.create-tema');
    }
}
