<?php

namespace App\Http\Livewire;

use Naykel\Gotime\Traits\WithDataTable;
use App\Models\Page;
use Livewire\WithPagination;
use Livewire\Component;

class PageTable extends Component
{

    use WithPagination, WithDataTable;

    public string $sortField = 'title';
    public string $searchField = 'title';
    public array $searchOptions = ['title' => 'Title'];

    public string $title = 'Site Pages Table';
    public string $routePrefix = 'pages';
    private static $model = Page::class;

    public function render()
    {
        sleep(1);

        $query = self::$model::search($this->searchField, $this->search)
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.page-table')->with(['items' => $query])
            ->layout('layouts.app', ['title' => $this->title]);
    }

}
