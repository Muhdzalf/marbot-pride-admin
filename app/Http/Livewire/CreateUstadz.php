<?php

namespace App\Http\Livewire;

use App\Models\Ustadz;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateUstadz extends Component
{
    public $ustadz;
    public $ustadzId;
    public $action;
    public $button;
    public $photo;

    use WithFileUploads;

    public function getRules()
    {
        $rules = ($this->action == "updateUstadz") ? [
            'ustadz.name' => 'required|max:50' . $this->ustadzId,
            'ustadz.description' => 'required|max:225'
        ] : ['ustadz.description' => 'required|max:225'];

        return array_merge([
            'ustadz.name' => 'required|max:50',
            'ustadz.description' => 'required|max:225',
            'ustadz.poster_url' => 'image'
        ], $rules);
    }

    public function createUstadz()
    {
        $this->resetErrorBag();
        $this->validate();
        $this->saveImage();

        Ustadz::create([
            'name' => $this->ustadz['name'],
            'description' => $this->ustadz['description'],
            'poster_url' => $this->photo->hashName(),
        ]);

        $this->emit('saved');
        $this->emit('ustadz');
    }

    public function updateUstadz()
    {
        $this->resetErrorBag();
        $this->validate();

        if ($this->photo) {
            $this->saveImage();
            Ustadz::query()->where('id', $this->ustadzId)->update(
                [
                    'name' => $this->ustadz->name,
                    'description' => $this->ustadz->description,
                    'poster_url' =>  $this->photo->hashName()
                ]
            );
        } else {
            Ustadz::query()->where('id', $this->ustadzId)->update(
                [
                    'name' => $this->ustadz->name,
                    'description' => $this->ustadz->description,
                ]
            );
        }


        $this->emit('saved');
    }

    public function saveImage()
    {
        if (!empty($this->photo)) {
            $this->photo->store('ustadz-photo', 'public');
            $this->ustadz['poster_url'] =  $this->photo->hashName();
        } else {
            dd('Photo Tidak ditemukan');
        }
    }

    public function deletePhoto()
    {
        // dd($this->ustadz['poster_url']);
        Storage::delete('public/ustadz-photo' . '/' . $this->ustadz['poster_url']);
        $this->ustadz['poster_url'] = null;
        $this->ustadz->save();
    }

    public function mount()
    {
        if (!$this->ustadz && $this->ustadzId) {
            $this->ustadz = Ustadz::find($this->ustadzId);
        }

        $this->button = create_button($this->action, "ustadz");
    }


    public function render()
    {
        return view('livewire.create-ustadz');
    }
}
