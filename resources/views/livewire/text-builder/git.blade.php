<div>
    <input type="text" wire:model.live="token" placeholder="Token" class="mb-5">

    <input type="text" wire:model.live="new_acc" placeholder="Account Name" class="mb-5">
    <button wire:click="create_acc">
        Save Account
    </button>

    <!-- wire:model.change -->
    <select wire:model.live="selectedAccId" id="selectedAcc">
        @forelse (\App\Models\Account::where('user_id', auth()->id())->get() as $acc)
        <option value="{{ $acc->id }}" {{ $selectedAccId == $acc->id ? 'selected' : '' }}>{{ $acc->name }}</option>
        @empty
        @endforelse
    </select>
    <button wire:click="delete_acc">
        Delete Account
    </button>

        <input type="text" wire:model.live="new_repo" placeholder="Repository Name">
        <button wire:click="create_repo">
            Save Repository
        </button>

    <select wire:model.live="selectedRepoId" wire:key="{{ $selectedAccId }}" id="selectedRepo">
        @forelse (\App\Models\Repository::whereAccountId($selectedAccId)->get() as $repo)
            <option value="{{ $repo->id }}" {{ $selectedRepoId == $repo->id ? 'selected' : '' }}>{{ $repo->name }}</option>
        @empty
        @endforelse
    </select>
    <button wire:click="delete_repo">
        Delete Repository
    </button>

        <ul>
            <h3 class="text-slate-900 dark:text-white mt-5 text-base font-medium tracking-tight">Set Git User
            </h3>
            <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">git config user.name {{ $selectedAccName ?? "" }}
            </p>
            <h3 class="text-slate-900 dark:text-white mt-5 text-base font-medium tracking-tight">Set Git Email
            </h3>
            <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">git config user.email</p>

            <h3 class="text-slate-900 dark:text-white mt-5 text-base font-medium tracking-tight">Set Git User
                Global
            </h3>
            <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">git config --global user.name
                {{ $selectedAccName ?? "" }}
            </p>
            <h3 class="text-slate-900 dark:text-white mt-5 text-base font-medium tracking-tight">Set Git Email
                Global
            </h3>
            <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">git config --global user.email</p>

            <h3 class="text-slate-900 dark:text-white mt-5 text-base font-medium tracking-tight">Clone</h3>
            <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">git clone
                https://x-access-token:{{ $token }}@github.com/{{ $selectedAccName ?? "" }}/{{ $selectedRepoName ?? "" }}.git
            </p>

            <h3 class="text-slate-900 dark:text-white mt-5 text-base font-medium tracking-tight">Upstream</h3>
            <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">git remote set-url origin
                https://{{ $selectedAccName ?? "" }}:{{ $token }}@github.com/{{ $selectedAccName ?? "" }}/{{ $selectedRepoName ?? "" }}.git
            </p>
        </ul>
</div>
