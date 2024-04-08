<?php

namespace App\Livewire;

use App\Models\Device;
use App\Models\Product;
use Livewire\Attributes\Locked;
use Livewire\Component;

class EditModal extends Component
{
    #[Locked]
    public int $id;
    public string $name = '';
    public string $price = '';
    public bool $showModal = false;

    public function edit( $deviceId )
    {
        $device = Device::find($deviceId);
        $this->id = $device->id;
        $this->name = $device->name;
        $this->price = $device->price;
        $this->showModal = true;
    }
    public function render()
    {
        return view('livewire.edit-modal', [
            'devices' => Device::all(),
        ]);
    }
}
