<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Screen1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('screen1_models')->insert([
            [
                'id' => 1,
                'title' => 'First Sample Title',
                'status' => 'active',
                'notes' => 'This is a sample note for the first entry.',
            ],
            [
                'id' => 2,
                'title' => 'Second Sample Title',
                'status' => 'inactive',
                'notes' => 'This is another example note.',
            ],
            [
                'id' => 3,
                'title' => 'Third Sample Title',
                'status' => 'pending',
                'notes' => 'A pending item with a note.',
            ],
        ]);
    }
}
