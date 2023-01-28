# NayKel Dev and Testing

## Ckeditor

This code creates a Livewire component that uses Alpine.js and Entangle to create a CKEditor 5 instance, while also utilizing the $editorId prop to set a unique id for the CKEditor element.

The @props([ 'for' => null ]) declares a prop $for with a default value of null, which is then used to set the name attribute of the textarea element and in the @this.set('{{ $for }}', editor.getData()); to set the value of the textarea when the data changes.

The x-data attribute is used to define the state of the component, here it's initializing the value property with the value of the model property, which is passed via the wire:model directive.

In the x-init attribute, the ClassicEditor.create function is used to initialize the CKEditor, using the unique id provided by the $editorId prop to select the textarea element. In the then callback, the change:data event is being listened to, and when it's fired, the @this.set('{{ $for }}', editor.getData()); sets the value of the $for prop to the data of the editor. The Livewire.on('reinit', () => {}) is used to handle the reinit event, which is fired when the component is re-initialized, here it's used to clear the editor data. The catch callback is used to handle errors
