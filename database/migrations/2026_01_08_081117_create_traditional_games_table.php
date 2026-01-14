<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('traditional_games', function (Blueprint $table) {
            $table->id();

            $table->foreignId('region_id')
                ->constrained('regions')
                ->onDelete('cascade');

            $table->string('name');               // Nama permainan
            $table->text('description');          // Deskripsi singkat
            $table->text('how_to_play');          // Cara bermain
            $table->string('image')->nullable();  // Gambar (opsional)

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('traditional_games');
    }
};
