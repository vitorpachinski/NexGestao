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
        // 1. Adicionar a coluna `contact_reasons_id` sem a chave estrangeira inicialmente
        Schema::table('site_contacts', function (Blueprint $table) {
            $table->foreignId('contact_reasons_id')->nullable()->after('reason'); // Permitir valores nulos temporariamente
        });

        // 2. Atualizar os valores de `contact_reasons_id` com base na coluna `reason`
        DB::statement('UPDATE site_contacts SET contact_reasons_id = reason');

        // 3. Criar a chave estrangeira e remover a coluna `reason`
        Schema::table('site_contacts', function (Blueprint $table) {
            $table->foreign('contact_reasons_id')
                  ->references('id')
                  ->on('contact_reasons')
                  ->onDelete('cascade'); // Cascata para evitar erros futuros

            $table->dropColumn('reason');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 1. Adicionar a coluna `reason` de volta
        Schema::table('site_contacts', function (Blueprint $table) {
            $table->integer('reason')->after('contact_reasons_id');
        });

        // 2. Reverter os dados de `reason` com base em `contact_reasons_id`
        DB::statement('UPDATE site_contacts SET reason = contact_reasons_id');

        // 3. Remover a chave estrangeira e a coluna `contact_reasons_id`
        Schema::table('site_contacts', function (Blueprint $table) {
            $table->dropForeign(['contact_reasons_id']);
            $table->dropColumn('contact_reasons_id');
        });
    }
};
