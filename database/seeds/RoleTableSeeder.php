<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('users')->truncate();

        DB::table('roles')->insert([
              [
                'name' => '管理员',
                'slug' => 'admin',
                'description' => '网站管理员',
                'level' => '4'
              ],
              [
                'name' => '医生',
                'slug' => 'doctor',
                'description' => '医院医生',
                'level' => '2'
              ]

            ]);
    }
}
