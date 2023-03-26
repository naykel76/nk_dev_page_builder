@props([ 'for' => null, 'rowClass' => null, ])

    <div {{ $attributes->whereDoesntStartWith('wire:model') }}
        x-data="{ value: @entangle($attributes->wire('model')).defer }" x-cloak
        x-init="
        ClassicEditor.create(document.querySelector('#{{ $editorId }}'))
        .then(editor => {
            if(value){
                editor.setData(value);
            }
            editor.model.document.on('change:data', () => {
                value = editor.getData();
            });
        })
        .catch(error => {
            console.error(error);
        });
        ">

        <textarea name="{{ $for }}" id="{{ $editorId }}" x-model="value" x-on:input.debounce.500ms></textarea>

    </div>

    @pushOnce('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    @endPushOnce

    @pushOnce('styles')
        <style>
            .ck .ck-content {
                min-height: 250px
            }

        </style>
    @endPushOnce
