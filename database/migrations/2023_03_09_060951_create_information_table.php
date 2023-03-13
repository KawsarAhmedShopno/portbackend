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
        Schema::create('information', function (Blueprint $table) {
            $table->id();
               $table->string('introduction');  
         
             $table->string('tech');
            $table->string('aboutImg');       
            $table->string('aboutMe');
            $table->string('aboutCaption');
            $table->string('fb');
            $table->string('git');
            $table->string('address');
            $table->string('phone');
            $table->string('infoemail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information');
    }
};
