<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageBlock;
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
        // PageBlock::create([
        //     'id' => 800,
        //     'title' => 'My first editor',
        //     'type' => 'editor',
        //     'body' => 'My first editor body',
        // ]);
        // PageBlock::create([
        //     'title' => 'My First Accordion Section',
        //     'type' => 'accordion',
        //     'body' => json_encode(
        //         [
        //             ['title' => 'Accordion Title 1', 'body' => 'Accordion 1 body'],
        //             ['title' => 'Accordion Title 2', 'body' => 'Accordion 2 body']
        //         ],
        //     ),
        // ]);
        // PageBlock::create([
        //     'title' => 'My second editor',
        //     'type' => 'editor',
        //     'body' => 'My second editor body',
        // ]);
        // PageBlock::create([
        //     'title' => 'My First Accordion Section',
        //     'type' => 'accordion',
        //     'body' => json_encode(
        //         [
        //             ['title' => 'Accordion Title 1', 'body' => 'Accordion 1 body'],
        //             ['title' => 'Accordion Title 2', 'body' => 'Accordion 2 body']
        //         ],
        //     ),
        // ]);


        $page = Page::create([
            'id' => '427',
            'title' => 'My First Page',
            'type' => 'builder',
            'body' => 'This is the main body for my first page!'
        ])->blocks()->createMany([
            [
                'id' => 800,
                'title' => 'This is my first editor',
                'type' => 'editor',
                'body' => 'This is my first editor body',
            ],
            [
                'title' => 'This is my second editor',
                'type' => 'editor',
                'body' => 'This is my second editor body',
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
                'title' => 'Text Editor Block',
                'type' => 'textarea',
                'body' => 'This is the text area body',
            ],

        ]);
    }
}
