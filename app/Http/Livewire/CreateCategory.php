<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CreateCategory extends Component
{

    public $category;
    public $categoryId;
    public $action;
    public $button;

    public function getRules()
    {
        $rules = ($this->action == "updateCategory") ? [
            'category.name' => 'required|max:50' . $this->categoryId
        ] : [
            'category.description' => 'required|max:225'
        ];

        return array_merge([
            'category.name' => 'required|max:50',
            'category.description' => 'required|max:225'
        ], $rules);
    }

    public function createCategory()
    {
        $this->resetErrorBag();
        $this->validate();

        Category::create($this->category);

        $this->emit('saved');
        $this->emit('category');
    }

    public function updateCategory()
    {
        $this->resetErrorBag();
        $this->validate();

        Category::query()->where('id', $this->categoryId)->update(
            [
                'name' => $this->category->name,
                'description' => $this->category->description
            ]
        );

        $this->emit('saved');
    }

    public function mount()
    {
        if (!$this->category && $this->categoryId) {
            $this->category = Category::find($this->categoryId);
        }

        $this->button = create_button($this->action, "Category");
    }

    public function render()
    {
        return view('livewire.create-category');
    }
}
