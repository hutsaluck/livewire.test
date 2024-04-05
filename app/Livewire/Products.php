<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Session;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;


class Products extends Component
{
    use WithPagination;

    public Collection $categories;
    #[Session]
    public string $searchQuery = '';
    public int $searchCategory = 0;

    public function mount()
    {
        $this->categories = Category::pluck('name', 'id');
    }

    public function updating( $key )
    {
        if( $key == 'searchQuery' || $key == 'searchCategory' ){
            $this->resetPage();
        }
    }

    public function render():View
    {
        sleep(1);
        $products = Product::with('category')
            ->when($this->searchQuery !== '', fn(Builder $query) => $query->where('name', 'like', '%'. $this->searchQuery .'%'))
            ->when($this->searchCategory > 0, fn(Builder $query) => $query->where('category_id', $this->searchCategory))
            ->paginate(10);
        return view('livewire.products', [
            'products' => $products,
        ]);
    }
}
