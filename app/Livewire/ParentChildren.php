<?php

namespace App\Livewire;

use App\Models\Device;
use Livewire\Component;
use Illuminate\Support\Collection;

class ParentChildren extends Component
{
    public string $customer_name = '';
    public string $customer_email = '';

    public array $orderDevices = [];
    public Collection $allDevices;

    public function mount()
    {
        $this->allDevices = Device::all();
        $this->orderDevices[] = ['device_id' => '', 'quantity' => 1];
    }

    public function addDevice(): void
    {
        $this->orderDevices[] = ['device_id' => '', 'quantity' => 1];
    }

    public function removeDevice( $index ): void
    {
        unset($this->orderDevices[$index]);
        $this->orderDevices = array_values($this->orderDevices);
    }

    public function render()
    {
        return view('livewire.parent-children');
    }
}
