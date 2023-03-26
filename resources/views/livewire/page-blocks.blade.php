<div>

    <div class="my">
        <x-gt-button wire:click.prevent="testSomething" text="Test" withIcon="idea" class="pink" />
        <x-gt-button-save wire:click.prevent="save" withIcon iconOnly />
        <x-gt-button wire:click.prevent="addBlock('accordion')" text="Accordion" withIcon="expand-o" />
        <x-gt-button wire:click.prevent="addBlock('textarea')" text="Textarea" withIcon="align-left" />
        <x-gt-button wire:click.prevent="addBlock('editor')" text="Editor" withIcon="editor" />
    </div>

    <x-gotime-errors />

    <div class="my space-y-05">

        @foreach($blocks as $i => $block)

            <div class="bx pxy-1">

                <div class="flex gg">

                    @unless($block['type'] === 'editor')
                        <x-gt-input wire:model.defer="blocks.{{ $i }}.title" for="blocks.{{ $i }}.title" placeholder="Block title" rowClass="flex-1" />
                    @endunless

                    @if($block['type'] === 'editor')
                        <x-ckeditor wire:model="blocks.{{ $i }}.body" for="blocks.{{ $i }}.body" class="flex-1" editor-id="{{ '_' . rand() }}" />
                    @elseif(($block['type'] === 'textarea'))
                        <x-gt-textarea wire:model.defer="blocks.{{ $i }}.body" for="blocks.{{ $i }}.body" placeholder="Block body" rowClass="flex-1" />
                    @else
                        <x-gt-input wire:model.defer="blocks.{{ $i }}.body" for="blocks.{{ $i }}.body" placeholder="Block body" rowClass="flex-1" />
                        <div class="txt-red">Other block type to be done!</div>
                    @endif

                    <x-gt-button-delete wire:click.prevent="removeBlock({{ $i }})" text="remove" />

                </div>

            </div>

        @endforeach

    </div>

    @pushOnce('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    @endPushOnce

</div>
