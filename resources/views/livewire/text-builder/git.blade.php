<div>
    <div class="mt-2 grid grid-cols-1 gap-x-2 gap-y-2 sm:grid-cols-3">
        <div class="sm:col-span-3">
            <input type="text" wire:model.live="token" placeholder="Token" class="mb-5">
        </div>
    </div>
    <div class="mt-2 grid grid-cols-1 gap-x-2 gap-y-2 sm:grid-cols-7">

        <div class="sm:col-span-3">
            <input type="text" wire:model.live="new_acc" placeholder="Account Name" class="mb-5">
        </div>
        <div class="sm:col-span-3">
            <input type="text" wire:model.live="new_email" placeholder="Email Name" class="mb-5">
        </div>
        <div class="sm:col-span-1">
            <button wire:click="create_acc" type="button" class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-green-50">
                Save Account
            </button>
        </div>
    </div>

    <div class="mt-2 grid grid-cols-1 gap-x-2 gap-y-2 sm:grid-cols-5">
        <div class="sm:col-span-3">
            <!-- wire:model.change -->
            <select wire:model.live="selectedAccId" id="selectedAcc">
                @forelse (\App\Models\Account::where('user_id', auth()->id())->get() as $acc)
                <option value="{{ $acc->id }}" {{ $selectedAccId == $acc->id ? 'selected' : '' }}>{{ $acc->name }}</option>
                @empty
                @endforelse
            </select>
        </div>

        <div class="sm:col-span-2">
            <button wire:click="delete_acc" type="button" class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-red-50">
                Delete Account
            </button>
        </div>
    </div>

    <div class="mt-2 grid grid-cols-1 gap-x-2 gap-y-2 sm:grid-cols-5">
        <div class="sm:col-span-3">
            <input type="text" wire:model.live="new_repo" placeholder="Repository Name">
        </div>
        <div class="sm:col-span-2">
            <button wire:click="create_repo" type="button" class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-green-50">
                Save Repository
            </button>
        </div>
    </div>
    <div class="mt-2 grid grid-cols-1 gap-x-2 gap-y-2 sm:grid-cols-5">
        <div class="sm:col-span-3">
            <select wire:model.live="selectedRepoId" wire:key="{{ $selectedAccId }}" id="selectedRepo">
                @forelse (\App\Models\Repository::whereAccountId($selectedAccId)->get() as $repo)
                <option value="{{ $repo->id }}" {{ $selectedRepoId == $repo->id ? 'selected' : '' }}>{{ $repo->name }}</option>
                @empty
                @endforelse
            </select>
        </div>
        <div class="sm:col-span-2">
            <button wire:click="delete_repo" type="button" class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-red-50">
                Delete Repository
            </button>
        </div>
    </div>

    <ul>
        <x-clipboard text='git config user.name {{ $selectedAccName ?? "" }}' description='Set Git User' />
        <x-clipboard text='git config --global user.name {{ $selectedAccName ?? "" }}' />

        <x-clipboard text='git config user.email {{$selectedMailname}}' description='Set Git Email' />
        <x-clipboard text='git config --global user.email {{$selectedMailname}}' />

        <x-clipboard text='git clone \
https://x-access-token:{{ $token }}@github.com/{{ $selectedAccName ?? "" }}/{{ $selectedRepoName ?? "" }}.git' description='Clone' />
        <x-clipboard text='git remote set-url origin \
https://{{ $selectedAccName ?? "" }}:{{ $token }}@github.com/{{ $selectedAccName ?? "" }}/{{ $selectedRepoName ?? "" }}.git' description='Upstream' />
    </ul>

</div>
