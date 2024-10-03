<?php

namespace App\Livewire\TextBuilder;

use App\Models\Github as GithubModel;
use Livewire\Component;

class Github extends Component
{
    public $unit_number;

    public $account_name = '';
    public $repository = '';
    public $token = 'INITGUEST';

    public function mount($unit_number)
    {
        $this->unit_number = $unit_number;
        // dd($this->unit_number);
        $unit = GithubModel::where('user_id', auth()->id())
            ->where('unit_number', $unit_number)
            ->first();

        if ($unit) {
            $this->account_name = $unit->account_name;
            $this->repository = $unit->repository;
        }else{
            $unit_number = 1;
        }
    }

    public function updateToken($newToken)
    {
        $this->token = $newToken;
        $this->emit('tokenUpdated');
    }

    protected $rules = [
        'account_name' => 'required|string|max:255',
        'repository' => 'required|string|max:255',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);


        GithubModel::updateOrCreate(
            ['user_id' => auth()->id(), 'unit_number' => $this->unit_number],
            ['account_name' => $this->account_name, 'repository' => $this->repository]
        );
    }

    public function render()
    {
        return view('livewire.text-builder.github');
    }
}
