<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\KajianTheme;
use App\Models\KajianVideo;
use App\Models\Ustadz;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVideo extends Component
{
    public $video;
    public $videoId;
    public $action;
    public $button;
    public $ustadzs;
    public $temas;
    public $categories;
    public $user;
    public $poster;
    public $tags;

    // public $videocategory;

    use WithFileUploads;

    public function getRules()
    {
        $rules = ($this->action == "updateVideo") ? [
            'video.title' => 'required|max:50' . $this->videoId,
        ] : ['video.description' => 'required|max:225'];

        return array_merge([
            'video.title' => 'required|max:50',
            'video.description' => 'required|max:225',
            'video.benefit' => 'required|max:225',
            'video.tag' => 'required|max:225',
            'video.video_url' => 'required',
        ], $rules);
    }

    public function createVideo()
    {
        $this->resetErrorBag();
        $this->validate();
        $this->saveImage();

        // $videocategory = new VideoCategory;
        $data = new KajianVideo;

        $inputdata = [
            'title' => $this->video['title'],
            'description' => $this->video['description'],
            'benefit' => $this->video['benefit'],
            'poster_url' => $this->poster->hashName(),
            'tag' => $this->video['tag'],
            'video_url' => $this->video['video_url'],
            'category_id' => $this->video['category_id'],
            'tema_id' => $this->video['tema_id'],
            'ustadz_id' => $this->video['ustadz_id'],
            'admin_id' => Auth::user()->id,
        ];

        $data->create(
            $inputdata
        );

        $this->emit('saved');
        $this->emit('video');
    }

    public function updateVideo()
    {
        $this->resetErrorBag();
        $this->validate();

        if (!empty($this->poster)) {
            $this->poster->store('poster', 'public');
            $inputdata = [
                'title' => $this->video['title'],
                'description' => $this->video['description'],
                'benefit' => $this->video['benefit'],
                'poster_url' => $this->poster->hashName(),
                'tag' => $this->video['tag'],
                'video_url' => $this->video['video_url'],
                'tema_id' => $this->video['tema_id'],
                'ustadz_id' => $this->video['ustadz_id'],
                'admin_id' => Auth::user()->id,
            ];

            KajianVideo::query()->where('id', $this->videoId)->update(
                $inputdata
            );
        } else {
            $inputdata = [
                'title' => $this->video['title'],
                'description' => $this->video['description'],
                'benefit' => $this->video['benefit'],
                'tag' => $this->video['tag'],
                'video_url' => $this->video['video_url'],
                'tema_id' => $this->video['tema_id'],
                'ustadz_id' => $this->video['ustadz_id'],
                'admin_id' => Auth::user()->id,
            ];

            KajianVideo::query()->where('id', $this->videoId)->update(
                $inputdata
            );
        }

        $this->emit('saved');
    }

    public function deletePoster()
    {
        Storage::delete('public/poster' . '/' . $this->video['poster_url']);
        $this->video['poster_url'] = null;
        $this->video->save();
    }

    public function mount()
    {
        if (!$this->video && $this->videoId) {
            $this->video = KajianVideo::find($this->videoId);
        }

        $this->categories = Category::all();
        $this->temas = KajianTheme::orderBy('title')->get();
        $this->tags = ['none', 'trending', 'new', 'popular'];
        $this->ustadzs = Ustadz::orderBy('name')->get();
        $this->button = create_button($this->action, "video");
    }

    public function render()
    {
        return view('livewire.create-video');
    }
}
