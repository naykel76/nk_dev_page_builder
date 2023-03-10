<div>
    {{-- <x-gt-title-bar :$title :$routePrefix /> --}}

    <x-gt-search-sort-toolbar :$searchField :$searchOptions :$paginateOptions hideButton />

    <table class="w-full">

        <thead>
            <x-gt-table.th sortable wire:click="sortField('title')" :direction="$sortField === 'title' ? $sortDirection : null" class="w-full">Title</x-gt-table.th>
            <th></th>
        </thead>

        <tbody wire:loading.class="txt-muted">

            @forelse($items as $item)

                <tr>
                    <td class="w-full">{{ $item->title }}</td>
                    <td>
                        <div class="flex">
                            @if($item->type === 'builder')
                                <a href="{{ route("page-builder.edit", $item->slug) }}" class="ml-05 btn blue sm pxy-025">
                                    <x-gt-icon-edit-o class="icon" /></a>
                            @else
                                {{-- <a href="{{ route("$routePrefix.edit", $item->slug) }}" class="ml-05 btn blue sm pxy-025">
                                <x-gt-icon-edit-o class="icon" /></a> --}}
                            @endif

                        </div>
                    </td>
                </tr>

            @empty

                <tr>
                    <td class="tac pxy txt-lg" colspan="6">No records found...</td>
                </tr>

            @endforelse

        </tbody>

    </table>

    {{ $items->links('gotime::pagination.livewire') }}

</div>
