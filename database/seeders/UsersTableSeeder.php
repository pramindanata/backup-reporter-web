<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::statement('ALTER SEQUENCE users_id_seq RESTART WITH 2');

        DB::table('users')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Eksa Pramindanata',
                'username' => 'pramindanata',
                'password' => '$2y$10$8vadgb/pvw7h.Djs.paxpelmYl7Gu6V3/jksD/d8iJc4X4OeYD4Du',
                'role' => 'ADMIN',
                'remember_token' => 'g1rON6gdfouAb0ktoTCIplJNGS0ztuHxBBvzinkj84nFprEVqayzZ31KlAYr',
                'created_at' => '2020-09-26 17:30:39+08',
                'updated_at' => '2020-09-26 17:30:39+08',
            ),
        ));

        User::factory()->count(63)->create();
    }
}
