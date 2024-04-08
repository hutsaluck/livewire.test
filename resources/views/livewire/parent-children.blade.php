<form wire:submit="save">
    <div>
        <label for="customer_name" class="block font-medium text-sm text-gray-700">Customer name</label>
        <input id="customer_name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" wire:model="customer_name" />
    </div>

    <div class="mt-4">
        <label for="customer_email" class="block font-medium text-sm text-gray-700">Customer email</label>
        <input id="customer_email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="email" wire:model="customer_email" />
    </div>

    <div class="block mt-4 w-full border border-gray-300 rounded-md shadow-sm">
        <div class="bg-gray-100 px-4 py-3">
            Devices
        </div>

        <div class="min-w-full align-middle p-4">
            <table class="min-w-full divide-y divide-gray-200 border">
                <thead>
                <tr>
                    <th class="px-6 py-2 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Device</span>
                    </th>
                    <th class="px-6 py-2 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Quantity</span>
                    </th>
                    <th class="px-6 py-2 bg-gray-50 text-left">
                    </th>
                </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                @foreach($orderDevices as $index => $orderDevice)
                    <tr>
                        <td class="px-2 py-2">
                            <select wire:model="orderDevices.{{ $index }}.Device_id" id="orderDevices[{{ $index }}][device_id]" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                <option value="0">-- choose device --</option>
                                @foreach($allDevices as $device)
                                    <option value="{{ $device->id }}">{{ $device->name }} ({{ number_format($device->price, 2) }})</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="px-2 py-2">
                            <input wire:model="orderDevices.{{ $index }}.quantity" id="orderDevices[{{ $index }}][price]" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="number" />
                        </td>
                        <td class="px-2 py-2">
                            <button wire:click="removeDevice({{ $index }})" type="button" class="px-3 py-2 bg-red-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <button wire:click="addDevice" type="button" class="mt-4 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                + Add Another Device
            </button>
        </div>

    </div>

    <button class="mt-4 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
        Save Device
    </button>
</form>