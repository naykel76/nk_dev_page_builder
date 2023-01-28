<?php

namespace App\Http\Livewire;

use Naykel\Gotime\Traits\WithCrud;
use App\Models\PageBlock;
use Livewire\Component;

class PageBlocks extends Component
{
    use WithCrud;

    private static $model = PageBlock::class;
    public array $removeBlocks = [];
    public array $blocks = [];

    protected $rules = [
        'blocks.*.title' => 'required',
        'blocks.*.body' => 'required',
    ];

    public function testSomething()
    {
        dd('there is nothing to test!');
    }

    public function mount()
    {
        $this->pageId = 427;
        $this->blocks = self::$model::all()->toArray();
    }

    public function save(): void
    {
        $this->validate();
        $this->handleBlocks();
        $this->dispatchBrowserEvent('notify', 'Page blocks have been saved');
    }

    /**
     * Loop through each 'block' and persist, update or delete
     */
    public function handleBlocks(): void
    {
        // !! If the block is an existing record it will update regardless. Which
        // means it may update un-necessarily because there is no change.
        foreach ($this->blocks as $block) {
            isset($block['id'])
                ? self::$model::find($block['id'])->update($block)  // existing record, UPDATE it
                : self::$model::create($block);                     // new record, CREATE it
        }

        foreach ($this->removeBlocks as $id) {
            $block = self::$model::find($id);
            $block ? $block->delete() : null;
        }

        $this->reset('removeBlocks');
    }

    /**
     * Add an empty 'block' value pairs causing an extra row to be rendered.
     */
    public function addBlock(string $type): void
    {
        $this->blocks[] = ['page_id' => $this->pageId, 'type' => $type, 'title' => '', 'body' => ''];
    }

    /**
     * Remove the item with the given key from the 'blocks' array, so a
     * rendered row will disappear.
     */
    public function removeBlock(int $i): void
    {
        // When block[id] exists (not index), then the item comes from the
        // database. Items are not removed from the database until we click
        // the save button, so store them in an array until it's go time!
        isset($this->blocks[$i]['id'])
            ? array_push($this->removeBlocks, $this->blocks[$i]['id'])
            : null;

        unset($this->blocks[$i]);

        $this->blocks = array_values($this->blocks);
    }

    public function render()
    {
        return view('livewire.page-blocks');
    }
}
