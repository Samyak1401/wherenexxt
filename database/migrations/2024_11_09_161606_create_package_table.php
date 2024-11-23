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
        Schema::create('package', function (Blueprint $table) {
            $table->integer("Package_Id", 12);
            $table->string("start_place");
            $table->string("Destination");
            $table->integer("Duration");
            $table->string("Description");
            $table->string("Inclusions");
            $table->string("Exclusions");
            $table->integer("Max_People");
            $table->date("Start_Date");
            $table->date("End_Date");
            $table->float("Price");
            $table->string("Poster_image");
            $table->string("Images");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package');
    }
};
