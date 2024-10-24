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
        Schema::create('customer', function (Blueprint $table) {
            $table->integer("Customer_id", 10);
            $table->string("Customer_Fname", 60);
            $table->string("Customer_Lname", 60);
            $table->string("Customer_Email", 150)->unique();
            $table->string("Customer_Password", 100);
            $table->enum('role', ['customer', 'admin'])->default('customer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
