<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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

        DB::table('users')->insert([
              [
                'name' => '管理员',
                'email' => 'xhstatis@hotmail.com',
                'password' => bcrypt('xh1990')
              ]
            ]);
    }
}
