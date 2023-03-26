@props(['hasContainer' => true, 'title' => null])

<x-gotime-layouts.base :$title>

    @includeFirst(['layouts.partials.navbar', 'gotime::layouts.partials.navbar'])

    @isset($top)
    {{ $top }}
    @endisset

    <main id="nk-main" class="py-5-3-2">

        @if($hasContainer) <div class="container"> @endif

            {{ $slot }}

        @if($hasContainer) </div> @endif

    </main>

    @isset($bottom)
        {{ $bottom }}
    @endisset

    @includeFirst(['layouts.partials.footer', 'gotime::layouts.partials.footer'])

</x-gotime-layouts.base>


