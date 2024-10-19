<?php

namespace App\Livewire\TextBuilder;

use App\Models\Account;
use App\Models\Repository;
use Livewire\Component;

class Git extends Component
{
    public $token;
    public $selectedAccId;
    public $selectedAccName;
    public $selectedRepoId;
    public $selectedRepoName;

    public $new_acc;
    public $new_repo;

    public $copytext = [
        'Set Git User' => 'git config user.name {{ $selectedAccName ?? "" }}',
        'header2' => 'txt2',
    ];

    public function mount(){
        if (!$this->selectedAccId) {
            $firstAccount = Account::where('user_id', auth()->id())->first();
            if($firstAccount){
                $this->selectedAccId = $firstAccount->id;
                $this->updatedSelectedAccId($this->selectedAccId);
            }
        }

        if (!$this->selectedRepoId) {
            $firstRepo = Repository::whereAccountId($this->selectedAccId)->first();
            if ($firstRepo){
                $this->selectedRepoId = $firstRepo->id;
                $this->updatedSelectedRepoId($this->selectedRepoId);
            }
        }
    }

    public function updatedSelectedAccId($value)
    {
        $this->selectedAccName = Account::find($value)->name;
    }
    public function updatedSelectedRepoId($value)
    {
        $this->selectedRepoName = Repository::find($value)->name;
    }

    public function create_acc()
    {
        $validatedAcc = $this->validate([
            'new_acc' => 'required|string|max:255',
        ]);
        Account::create([
            'user_id' => auth()->id(),
            'name' => $validatedAcc['new_acc']
        ]);
        $this->updatedSelectedAccId($this->selectedAccId);
        $this->new_acc = '';
    }
    public function create_repo()
    {
        if ($this->selectedAccId != null){
            $validatedRepo = $this->validate([
                'new_repo' => 'required|string|max:255',
            ]);
            Repository::create([
                'name' => $validatedRepo['new_repo'],
                'account_id' => $this->selectedAccId
            ]);
        }
        #$this->updatedSelectedRepoId($this->selectedRepoId);
        $this->new_repo = "";
    }

    public function delete_repo(){
        $dbRepo = Repository::find($this->selectedRepoId);
        $dbRepo->delete();
    }

    public function delete_acc(){
        $dbAcc = Account::find($this->selectedAccId);
        $dbRepos = Repository::where('account_id', $this->selectedAccId)->get();
        foreach ($dbRepos as $dbRepo){
            $dbRepo->delete;
        }
        $dbAcc->delete();
    }

    public function render()
    {
        return view('livewire.text-builder.git');
    }
}
