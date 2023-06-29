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
        Schema::rename("cialprojects", "customers");
        Schema::create('customers', function (Blueprint $table) {
            $table->id('cust_id');//cust_id for customers table in cialprojects.
            $table->string('name', 60);
            $table->string('phone_number', 20);
            $table->string('email', 100);
            $table->text('message', 150);
            $table->timestamps();//created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            //
        });
    }
};
