<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('site_contacts', function (Blueprint $table) {
            $table->foreignId('contact_reasons_id');
        });

        DB::statement('update site_contacts set contact_reasons_id = contact_reasons_id');

        Schema::table('site_contacts', function (Blueprint $table) {
            $table->foreign('contact_reasons_id')->references('id')->on('contact_reasons');
            $table->dropColumn('reason');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_contacts', function (Blueprint $table) {
            $table->integer('reason')->nullable();
            $table->dropForeign(['contact_reasons_id']);
            
        });

        DB::statement('update site_contacts set reason = contact_reasons_id');

        Schema::table('site_contacts', function (Blueprint $table) {
            $table->dropColumn('contact_reasons_id');
        });
    }
};
