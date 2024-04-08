<?php

namespace App\Livewire;

use App\Models\City;
use Livewire\Component;
use App\Models\Country;
use Illuminate\Support\Collection;

class DropDowns extends Component
{
    public Collection $countries;
    public Collection $cities;

    public int $country;
    public int $city;

    public function mount()
    {
        $this->countries = Country::pluck('name', 'id');
        $this->cities = collect();
    }

    public function updatedCountry( $value )
    {
        $this->cities = City::where('country_id', $value)->get();
        $this->city = $this->cities->first()->id;
    }
    public function render()
    {
        return view('livewire.drop-downs');
    }
}
