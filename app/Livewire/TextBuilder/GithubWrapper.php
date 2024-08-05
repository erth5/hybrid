<?php

namespace App\Livewire\TextBuilder;

use App\Models\Github;
use Livewire\Component;

class GithubWrapper extends Component
{
    public $units = [];

    public function mount()
    {
        $this->units = Github::where('user_id', auth()->id())->orderBy('unit_number')->get();
    }

    public function addUnit()
    {
        if (count($this->units) < 5) {
            $this->units->push(new Github(['unit_number' => count($this->units) + 1]));
        }
    }

    public function deleteUnit($index)
    {
        $unit = $this->units->pull($index);
        if ($unit->exists) {
            $unit->delete();
        }
        $this->reorderUnits();
    }

    private function reorderUnits()
    {
        foreach ($this->units as $index => $unit) {
            $unit->unit_number = $index + 1;
            $unit->save();
        }
    }

    public function render()
    {
        return view('livewire.text-builder.github-wrapper');
    }
}
