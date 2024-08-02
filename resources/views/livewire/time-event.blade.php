<div>
    <div class="mx-auto w-1/2">

        <dl class="mx-auto grid grid-cols-1 gap-px bg-gray-900/5 sm:grid-cols-2 lg:grid-cols-4">

            <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 bg-white px-4 py-10 sm:px-6 xl:px-8">
                <div wire:poll.1s>
                    Aktuelle Zeit: {{ now() }}
                </div>
            </div>
            <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 bg-white px-4 py-10 sm:px-6 xl:px-8">
                <dt class="text-sm font-medium leading-6 text-gray-500">Overdue</dt>
                <dd class="text-xs font-medium text-rose-600">nix</dd>
                <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">---</dd>
            </div>
        </dl>
    </div>


</div>
