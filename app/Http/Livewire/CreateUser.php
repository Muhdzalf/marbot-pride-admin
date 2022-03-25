<?php

namespace App\Http\Livewire;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

// use LiveWire\WithFileUploads;

class CreateUser extends Component
{
    // use WithFileUploads;
    public $user;
    public $userId;
    public $action;
    public $button;

    public $photo;

    use WithFileUploads;

    protected function getRules()
    {
        $rules = ($this->action == "updateUser") ? [
            'user.email' => 'required|email|unique:users,email,' . $this->userId,

        ] : [
            'user.password' => 'required|min:8|confirmed',
            'user.password_confirmation' => 'required' // livewire need this
        ];

        return array_merge([
            'user.name' => 'required|min:3',
            'user.email' => 'required|email|unique:users,email',
            'photo' => 'nullable',
            'user.city' => 'nullable',
            'user.phone_number' => 'required',
            'user.birth_date' => 'required',
            'user.role' => 'required',
        ], $rules);
    }

    public function createUser()
    {
        $this->resetErrorBag();
        $this->validate();

        $password = $this->user['password'];

        if (!empty($password)) {
            $this->user['password'] = Hash::make($password);
        }

        User::create($this->user);

        $this->emit('saved');
        $this->reset('user');
    }

    public function updateUser()
    {
        $this->resetErrorBag();
        $this->validate();


        if (!empty($this->photo)) {
            $this->photo->store('photos', 'public');

            User::query()
                ->where('id', $this->userId)
                ->update(
                    [
                        "name" => $this->user->name,
                        "email" => $this->user->email,
                        "phone_number" => $this->user->phone_number,
                        "city" => $this->user->city,
                        "birth_date" => $this->user->birth_date,
                        "profile_photo_path" => $this->photo->hashName(),
                        "role" => $this->user->role,
                    ]
                );
        } else {
            User::query()
                ->where('id', $this->userId)
                ->update(
                    [
                        "name" => $this->user->name,
                        "email" => $this->user->email,
                        "phone_number" => $this->user->phone_number,
                        "city" => $this->user->city,
                        "birth_date" => $this->user->birth_date,
                        "role" => $this->user->role,
                    ]
                );
        }

        $this->emit('saved');
    }

    public function deletePhoto()
    {
        Storage::delete('public/photos/' . $this->user->profile_photo_path);
        $this->user->profile_photo_path = null;
        $this->user->profile_photo_path->save();
    }

    public function mount()
    {
        if (!$this->user && $this->userId) {
            $this->user = User::find($this->userId);
        }

        $this->button = create_button($this->action, "User");
    }

    public function render()
    {
        return view('livewire.create-user');
    }
}
