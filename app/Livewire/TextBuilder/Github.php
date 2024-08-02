<?php

namespace App\Livewire\TextBuilder;

use Livewire\Component;

class Github extends Component
{
    public $account_name = '';
    public $repository = '';
    public $token = '';
    public $combinedString = '';

    // public function updated($propertyName)
    // {
    //     $this->combineInputs();
    // }

    public function combineInputs()
    {
        $this->combinedString = $this->account_name . ' ' . $this->repository . ' ' . $this->token;
    }
    public function render()
    {
        return view('livewire.text-builder.github');
    }
}
