@props([ 'for' => null, 'rowClass' => null, ])

<div {{ $attributes->whereDoesntStartWith('wire:model') }}
    x-data="{ value: @entangle($attributes->wire('model')) }" x-cloak
    x-init="
        ClassicEditor.create(document.querySelector('#{{ $editorId }}'))

        {{-- This way, when the user types in the editor, the value property
        will be updated and the wire:model will be triggered. --}}
        .then(editor => {
            editor.setData(value);
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

@once('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
@endonce

@push('styles')

    <style>
        .ck .ck-content {
            min-height: 250px
        }

    </style>

@endpush
