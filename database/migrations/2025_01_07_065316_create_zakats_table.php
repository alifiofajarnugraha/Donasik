<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('zakats', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->decimal('penghasilan', 12, 0); // Untuk angka besar tanpa desimal
            $table->decimal('thr_bonus', 12, 0);
            $table->decimal('utang', 12, 0);
            $table->decimal('cicilan', 12, 0);
            $table->decimal('zakat', 12, 0);
            $table->boolean('is_paid')->default(false); // Untuk status pembayaran
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('zakats');
    }
};