<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // First add the user_id column
        Schema::table('ktp_registrations', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('id')->constrained('users')->onDelete('set null');
        });

        // Then update the status enum values
        // We need to use DB statements for this as Laravel doesn't support changing enum columns directly
        DB::statement("ALTER TABLE ktp_registrations MODIFY COLUMN status ENUM('PENDING', 'VERIFIED', 'PROCESSING', 'READY', 'COMPLETED', 'REJECTED') DEFAULT 'PENDING'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // First revert the status enum values
        DB::statement("ALTER TABLE ktp_registrations MODIFY COLUMN status ENUM('PENDING', 'VERIFIED', 'REJECTED') DEFAULT 'PENDING'");

        // Then drop the user_id column
        Schema::table('ktp_registrations', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
