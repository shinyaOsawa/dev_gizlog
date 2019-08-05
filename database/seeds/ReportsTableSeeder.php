<?php

use Illuminate\Database\Seeder;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reports')->insert([
            [
                'user_id'        => '1',
                'title'          => 'Laravel Lessonを終わらせる',
                'contents'        => 'gizlogを完了させたい',
                'reporting_time' => '2019-01-01',
                'created_at'     => Carbon::create(2018, 1, 1),
                'updated_at'     => Carbon::create(2018, 1, 4),
            ],
            [
                'user_id'        => '1',
                'title'          => 'レビューに向けて理解を深める',
                'contents'        => '理解を深めたい',
                'reporting_time' => '2019-01-02',
                'created_at'     => Carbon::create(2018, 1, 1),
                'updated_at'     => Carbon::create(2018, 1, 4),
            ],
        ]);
    }
}
