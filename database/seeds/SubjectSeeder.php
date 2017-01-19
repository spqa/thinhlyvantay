<?php

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Subject::create([
            'name' => 'Anh'
        ]);

        \App\Subject::create([
            'name' => 'GDCD'
        ]);
        \App\Subject::create([
            'name' => 'Công Nghệ'
        ]);
        \App\Subject::create([
            'name' => 'Địa Lý'
        ]);
        \App\Subject::create([
            'name' => 'Vật Lý'
        ]);
        \App\Subject::create([
            'name' => 'Hóa Học'
        ]);
        \App\Subject::create([
            'name' => 'Quốc Phòng'
        ]);
        \App\Subject::create([
            'name' => 'Sinh'
        ]);
        \App\Subject::create([
            'name' => 'Sử'
        ]);
        \App\Subject::create([
            'name' => 'Tin'
        ]);
        \App\Subject::create([
            'name' => 'Toán'
        ]);
        \App\Subject::create([
            'name' => 'Văn'
        ]);
    }
}
