<?php

use Illuminate\Database\Seeder;

class DirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::unprepared(file_get_contents(database_path() . '/sqls/districts.sql'));
        $this->command->info('Districts table seeded!');
    }
}
