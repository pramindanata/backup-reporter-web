<?php

use App\Enums\AccessTokenActivationStatus;
use App\Enums\TableName;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(TableName::AccessToken, function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('value')->unique();
            $table->string('short_value');
            $table->enum('activation_status', [
                AccessTokenActivationStatus::Activated, AccessTokenActivationStatus::NotActivated
            ]);
            $table->foreignId('telegram_account_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
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
        Schema::dropIfExists(TableName::AccessToken);
    }
}
