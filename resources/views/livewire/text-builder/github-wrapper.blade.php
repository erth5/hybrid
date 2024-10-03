<div>

    <label for="token" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Will not be saved</label>
    <input type="text" wire:model.lazy="token" placeholder="Token" class="mb-5">

    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3">
        @foreach ($units as $index => $unit)
        <li class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg">

            <livewire:text-builder.github :unit_number="$unit->unit_number"
                :token="$token"
                :wire:key="'text-builder.github-'.$unit->unit_number">

                Einheitennummer: {{$unit->unit_number}}

            <button type="button" wire:click="deleteUnit({{ $index }})" class="mt-2 px-4 py-2 text-white bg-red-500 hover:bg-red-600 rounded-lg shadow dark:bg-red-600 dark:hover:bg-red-700">
                -
            </button>
        </li>
        @endforeach
    </ul>

    @if(count($units) < 20) <button type="button" wire:click="addUnit" class="mt-4 px-6 py-3 text-white bg-blue-500 hover:bg-blue-600 rounded-lg shadow dark:bg-blue-600 dark:hover:bg-blue-700">
        add
        </button>
        @endif
</div>
