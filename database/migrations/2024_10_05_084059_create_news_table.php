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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Заголовок')->unique();
            $table->text('content')->comment('Содержание');
            $table->string('source')->comment('Источник');
            $table->string('image_url')->comment('Ссылка на картинку')->nullable();
            $table->timestamp('published_at')->comment('Дата публикации')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
