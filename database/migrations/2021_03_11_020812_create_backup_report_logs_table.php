<?php

use App\Enums\BackupReportStatus;
use App\Enums\TableName;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackupReportLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(TableName::BackupReportLog, function (Blueprint $table) {
            $table->id();
            $table->enum('status', [BackupReportStatus::Success, BackupReportStatus::Failed]);
            $table->json('detail');
            $table->timestampTz('created_at')->nullable()->useCurrent();
            $table->timestampTz('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(TableName::BackupReportLog);
    }
}
