<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('timetable')->insert([
            ['so_tiet'=>1,'type'=>0],
            ['so_tiet'=>2,'type'=>0],
            ['so_tiet'=>3,'type'=>0],
            ['so_tiet'=>4,'type'=>0],
            ['so_tiet'=>5,'type'=>0],

            ['so_tiet'=>1,'type'=>1],
            ['so_tiet'=>2,'type'=>1],
            ['so_tiet'=>3,'type'=>1],
            ['so_tiet'=>4,'type'=>1],
            ['so_tiet'=>5,'type'=>1],
        ]);
    }
}
