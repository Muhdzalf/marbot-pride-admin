<?php

namespace App\Http\Livewire;

use App\Models\DonationMethod;
use Livewire\Component;

class CreateMethod extends Component
{

    public $method;
    public $methodId;
    public $action;
    public $button;

    public function getRules()
    {
        $rules = ($this->action == "updateMethod") ? [
            'method.name' => 'required|max:50' . $this->methodId
        ] : ['method.name' => 'required|max:50'];

        return array_merge([
            'method.name' => 'required|max:50',
        ], $rules);
    }

    public function createMethod()
    {
        $this->resetErrorBag();
        $this->validate();

        DonationMethod::create($this->method);

        $this->emit('saved');
        $this->emit('method');
    }

    public function updateMethod()
    {
        $this->resetErrorBag();
        $this->validate();

        DonationMethod::query()->where('id', $this->methodId)->update(
            [
                'name' => $this->method->name,
            ],
        );

        $this->emit('saved');
    }

    public function mount()
    {
        if (!$this->method && $this->methodId) {
            $this->method = DonationMethod::find($this->methodId);
        }

        $this->button = create_button($this->action, "Method");
    }

    public function render()
    {
        return view('livewire.create-method');
    }
}
