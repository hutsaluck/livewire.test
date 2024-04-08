<?php

namespace App\Livewire;

use App\Livewire\Forms\ProductsForm;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Livewire\WithFileUploads;

class ProductsCreate extends Component
{
    use WithFileUploads;

    public ProductsForm $form;
    public Collection $categories;

    public function mount(): void
    {
        $this->categories = Category::pluck('name', 'id');
    }

    public function save()
    {
        $this->form->save();

        $this->redirect('/products');
    }

    public function render(): View
    {
        return view('livewire.products-create');
    }
}
