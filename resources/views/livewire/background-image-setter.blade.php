    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-xs p-4 m-auto bg-white rounded shadow">
            <form wire:submit.prevent="saveBackgroundImage">
                <input type="file" wire:model="backgroundImage">
                @error('backgroundImage') <span class="error">{{ $message }}</span> @enderror
                <button type="submit">Upload Background</button>
            </form>
        </div>
    </div>

    {{-- <script>
    Livewire.on('backgroundImageUpdated', path => {
        document.body.style.backgroundImage = `url("/storage/${path}")`;
    });
</script> --}}
