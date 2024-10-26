<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->string('user_name');
            $table->unsignedBigInteger('commentable_id');
            $table->string('commentable_type');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};