<?php

namespace Database\Seeders;

use App\Models\AccessToken;
use Illuminate\Database\Seeder;

class AccessTokensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AccessToken::factory()->count(45)->create();
    }
}
