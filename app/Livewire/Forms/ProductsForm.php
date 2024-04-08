<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductsForm extends Form
{
    public ?Product $product;
    #[Validate('required|min:3')]
    public string $name = '';
    #[Validate('required|min:3')]
    public string $description = '';
    #[Validate('required|string')]
    public string $color = '';
    #[Validate('boolean')]
    public bool $in_stock = true;
    #[Validate('required|array', as: 'category')]
    public array $productCategories = [];
    #[Validate('image')]
    public $image;

    public function setProduct(Product $product): void
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->category_id = $product->category_id;
        $this->color = $product->color;
        $this->in_stock = $product->in_stock;
        $this->productCategories = $product->categories()->pluck('id')->toArray();
    }

    public function save(): void
    {
        $this->validate();

        $filename = $this->image->store('products', 'public');

        $product = Product::create($this->all() + ['photo' => $filename]);
        $product->categories()->sync($this->productCategories);
    }

    public function update(): void
    {
        $this->validate();

        $filename = $this->image->store('products', 'public');

        $this->product->update($this->all() + ['photo' => $filename]);
        $this->product->categories()->sync($this->productCategories);
    }
}
