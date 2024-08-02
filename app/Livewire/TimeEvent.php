<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Psy\Readline\Hoa\Console;

class TimeEvent extends Component
{
    protected $listeners = ['checkTime' => 'checkTime'];
    public $message;

    public function mount()
    {
        $this->checkTime();
    }

    public function checkTime()
    {
        $now = Carbon::now('Europe/Berlin'); // UTC+1

        if ($now->hour == 10 && $now->minute == 0) {
            $this->message = "Es ist 10:00 Uhr! Zeit für Aktion 1!";
        } elseif ($now->hour == 14 && $now->minute == 30) {
            $this->message = "Es ist 14:30 Uhr! Zeit für Aktion 2!";
        } else {
            $this->message = now()->format('d.m.Y H:i:s');
        }
    }

    public function render()
    {
        return view('livewire.time-event');
    }
}
