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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

$table->foreignId('user_id')->constrained()->onDelete('cascade');
$table->foreignId('lesson_package_id')->constrained()->onDelete('cascade');

$table->date('date');   // reservation date
$table->time('time');   // reservation time

$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
