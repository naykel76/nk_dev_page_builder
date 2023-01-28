<div>

    <div class="my">
        <x-gt-button wire:click.prevent="testSomething" withIcon="idea" class="pink" />
        <x-gt-button-save wire:click.prevent="save" withIcon iconOnly />
        <x-gt-button wire:click.prevent="addBlock('abc')" text="Add Item" withIcon="plus-round" />
    </div>

    <x-gotime-errors />

    <div class="my space-y-05">

        @foreach($blocks as $i => $block)

            <div class="bx pxy-1">

                <div class="flex gg">

                    <x-gt-input wire:model.defer="blocks.{{ $i }}.title" for="blocks.{{ $i }}.title" placeholder="Block title" rowClass="flex-1" />
                    <x-gt-input wire:model.defer="blocks.{{ $i }}.body" for="blocks.{{ $i }}.body" placeholder="Block body" rowClass="flex-1" />

                    <x-gt-button-delete wire:click.prevent="removeBlock({{ $i }})" text="remove" />

                </div>

            </div>

        @endforeach

    </div>

</div>
