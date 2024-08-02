<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;

class GetBackground
{
    use AsAction;

    public function handle()
    {
        $imageFiles = glob(storage_path("storage/backgrounds/" . auth()->user() . "_*"));
        $imagePath = count($imageFiles) > 0 ? $imageFiles[0] : null;

        logger()->info($imagePath);
        if ($imagePath) {
            return $imageFiles;
        } else {
            return "default.png";
        }
    }
}
