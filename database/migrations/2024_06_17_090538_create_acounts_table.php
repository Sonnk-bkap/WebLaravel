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
        Schema::create('acounts', function (Blueprint $table) {
            $table->id();
            $table->string('username',100)->unique();
            $table->string('password',200);
            $table->string('fulname',250);
            $table->string('phone',100);
            $table->string('email',200);
            $table->integer('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acounts');
    }
};
