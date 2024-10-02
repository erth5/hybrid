<div>
    <input type="text" wire:model.lazy="account_name" placeholder="Account Name">
    <input type="text" wire:model.lazy="repository" placeholder="Repository">

    <label for="email" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Will not be saved</label>

    <h3 class="text-slate-900 dark:text-white mt-5 text-base font-medium tracking-tight">Set Git User</h3>
    <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">git config user.name {{ $account_name }}</p>
    <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">git config user.email</p>
    <h3 class="text-slate-900 dark:text-white mt-5 text-base font-medium tracking-tight">Set Git Email</h3>

    <h3 class="text-slate-900 dark:text-white mt-5 text-base font-medium tracking-tight">Clone</h3>
    <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">git clone https://x-access-token:{{$token}}@github.com/{{$account_name}}/{{$repository}}.git</p>

    <h3 class="text-slate-900 dark:text-white mt-5 text-base font-medium tracking-tight">Upstream</h3>
    <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">git remote set-url origin https://{{$account_name}}:{{$token}}@github.com/{{$account_name}}/{{$repository}}.git</p>

</div>
