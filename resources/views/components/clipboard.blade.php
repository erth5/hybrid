<div class="flex items-start justify-between bg-gray-100 p-2 mb-2 rounded">
    <div class="flex-grow overflow-x-auto pr-4">
        @isset($description)
        <p class="text-slate-500 dark:text-slate-400 mb-2 text-sm">{{ $description }}</p>
        @endisset
        <pre class="overflow-x-auto"><code class="font-mono whitespace-pre-wrap break-words">{{ $text }}</code></pre>
    </div>
    <div class="flex-shrink-0">
        <button x-data x-on:click="
                $clipboard($el.closest('div').previousElementSibling.querySelector('code').innerText);
                $dispatch('copied', {message: 'Command copied'})
            " class="text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" />
                <path d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z" />
            </svg>
        </button>
    </div>
</div>
