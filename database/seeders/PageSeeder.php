<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = Page::create([
            'id' => '427',
            'title' => 'My First Page',
            'type' => 'builder',
            'body' => 'This is the main body for my first page!'
        ])->blocks()->createMany([
            [
                'id' => 800,
                'title' => 'Simple Editor',
                'type' => 'simple-editor',
                'body' => 'Simple editor body',
            ],
            [
                'id' => 900,
                'title' => 'My First Accordion Section',
                'type' => 'accordion',
                'body' => json_encode(
                    [
                        ['title' => 'Accordion Title 1', 'body' => 'Accordion 1 body'],
                        ['title' => 'Accordion Title 2', 'body' => 'Accordion 2 body']
                    ],
                ),
            ],
            [
                'title' => 'Advanced Editor',
                'type' => 'editor',
                'body' => 'Advanced editor body',
            ],
            [
                'title' => 'Textarea',
                'type' => 'textarea',
                'body' => 'This is a rich text editor page-section.',
            ]
        ]);

    }
}
