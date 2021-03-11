<?php

namespace Database\Seeders;

use App\Models\BackupReportLog;
use Illuminate\Database\Seeder;

class BackupReportLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        BackupReportLog::factory()->count(20)->create();
        BackupReportLog::factory()->count(10)->failed()->create();
    }
}
