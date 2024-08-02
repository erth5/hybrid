<x-app-layout>
    <div class="w-full max-w-xs p-4 m-auto bg-white rounded shadow mt-7">
        <h2>Background Upload</h2>

        <form action="{{ route('background.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="inputImage">Background:</label>
            <input type="file" name="background" id="inputImage" @error('background') is-invalid @enderror">

            @error('background')
            <span style="color:red;">{{ $message }}</span>
            @enderror
            <button type="submit">upload</button>
        </form>
    </div>

    asset('storage/backgrounds/default.png')
    <img alt="background" src="{{asset('default.png')}}">

</x-app-layout>

<style>
    body {
        background-image: url("{{ asset('storage/backgrounds/default.png') }}");
        background-size: cover;
        /* Stellt sicher, dass das Bild den ganzen Hintergrund abdeckt */
        background-position: center;
        /* Zentriert das Bild */
        background-repeat: no-repeat;
        /* Verhindert das Wiederholen des Bildes */
    }

</style>
