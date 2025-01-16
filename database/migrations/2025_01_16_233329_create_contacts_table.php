<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('contact_type'); // 'whatsapp' ou 'phone'
            $table->string('number');
            $table->timestamps();

            // Definindo a chave estrangeira
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade'); // Deleta contatos ao excluir um cliente
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
