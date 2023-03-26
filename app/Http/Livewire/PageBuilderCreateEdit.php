<?php

namespace App\Http\Livewire;

use Naykel\Gotime\Traits\WithCrud;
use Naykel\Pageit\Models\Page;
use Livewire\Component;

class PageBuilderCreateEdit extends Component
{
    use WithCrud;

    private static $model = Page::class;
    public string $routePrefix = 'page-builder';
    public array $initialData = ['config' => ['type=' => 'builder']];
    public object $editing;
    public string $title;

    protected $rules = [
        'editing.title' => 'required|min:3',
        'editing.body' => 'sometimes',
        'editing.config.type' => 'required'
        // 'editing.type' => 'required', // set in initial data
    ];

    public function mount(Page $page)
    {
        // if there is a page id, then set editing to the existing record
        $this->editing = $page->id ? $page : $this->makeBlankModel();
        $this->title = $this->setTitle();
        dd($this->editing);
    }

    public function render()
    {
        return view('livewire.page-builder-create-edit')
            ->layoutData(['title' => $this->title]);
    }
}
