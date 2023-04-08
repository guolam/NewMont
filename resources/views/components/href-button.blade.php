@props(['active', 'href', 'badge'])


<a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700  focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}
   href="{{ $href }}"
   :class="request()->routeIs($active) ? 'bg-gray-100' : ''">
    {{ $slot }}
    @if(isset($badge) && $badge > 0)
        <span class="ml-2 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
            {{ $badge }}
        </span>
    @endif
    
</a>
