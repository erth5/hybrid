    <div>
        @foreach($copytext as $header => $text)
        <div class="flex items-center justify-between bg-gray-100 p-2 mb-2 rounded">
            <code class="font-mono">{{ $text }}</code>
            <button x-data x-on:click="
                    $clipboard('{{ $text }}');
                    $dispatch('copied', {message: '{{$header}} copied'})
                " class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" />
                    <path d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z" />
                </svg>
            </button>
        </div>
        @endforeach

        <div x-data="{ show: false, message: '' }" x-on:copied.window="
            show = true;
            message = $event.detail.message;
            setTimeout(() => show = false, 2000)
        ">
            <div x-show="show" class="fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded">
                <span x-text="message"></span>
            </div>
        </div>
    </div>