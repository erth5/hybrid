<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class BackgroundImageSetter extends Component
{
    use WithFileUploads;

    #[Validate('image|max:2048')]
    public $backgroundImage;

    public function saveBackgroundImage()
    {
        if (!$this->backgroundImage) {
            session()->flash('error', 'Keine Datei zum Hochladen gefunden.');
            return;
        }

        try {
            if (!$this->backgroundImage || !$this->backgroundImage->isValid()) {
                throw new \Exception("Datei konnte nicht korrekt verarbeitet werden.");
            }

            $path = $this->backgroundImage->store('backgrounds', 'public');
        } catch (\Exception $e) {
            session()->flash('error', 'Fehler beim Hochladen: ' . $e->getMessage());
            return;
        }

        $path = $this->backgroundImage->store('backgrounds', 'public');
    }
    public function render()
    {
        return view('livewire.background-image-setter');
    }
}
