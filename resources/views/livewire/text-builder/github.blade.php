<div class="p-3">
    <div class="overflow-hidden rounded-lg bg-white dark:bg-gray-800 shadow">
        <div class="px-4 py-5 sm:p-6">
            {{-- <div class="bg-white dark:bg-slate-800 rounded-lg px-6 py-8 ring-1 ring-slate-900/5 shadow-xl"> --}}
            {{-- </div> --}}
            {{-- <div>
                    <span class="inline-flex items-center justify-center p-2 bg-indigo-500 rounded-md shadow-lg">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <!-- ... --></svg>
                    </span>
                </div> --}}

            <input type="text" wire:model.lazy="account_name" placeholder="Account Name">
            <input type="text" wire:model.lazy="repository" placeholder="Repository">
            <input type="text" wire:model.lazy="token" placeholder="Token">

            <h3 class="text-slate-900 dark:text-white mt-5 text-base font-medium tracking-tight">Set Git User</h3>
            <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">git config user.name {{ $account_name }}</p>
            <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">git config user.email</p>
            {{-- <h3 class="text-slate-900 dark:text-white mt-5 text-base font-medium tracking-tight">Set Git Email</h3>
    <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">Combined String: {{ $combinedString }}</p> --}}

            <h3 class="text-slate-900 dark:text-white mt-5 text-base font-medium tracking-tight">Clone</h3>
            <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">git clone https://x-access-token:{{$token}}@github.com/{{$account_name}}/{{$repository}}.git</p>

            <h3 class="text-slate-900 dark:text-white mt-5 text-base font-medium tracking-tight">Upstream</h3>
            <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">git remote set-url origin https://{{$account_name}}:{{$token}}@github.com/{{$account_name}}/{{$repository}}.git</p>
        </div>
    </div>
</div>
