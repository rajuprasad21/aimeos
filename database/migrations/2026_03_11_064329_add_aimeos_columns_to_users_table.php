<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Add siteid if it doesn't exist (used for multi-tenancy)
            if (!Schema::hasColumn('cl_users', 'siteid')) {
                $table->string('siteid')->nullable()->index();
            }
            // Add superuser flag if it doesn't exist
            if (!Schema::hasColumn('cl_users', 'superuser')) {
                $table->tinyInteger('superuser')->default(0);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
