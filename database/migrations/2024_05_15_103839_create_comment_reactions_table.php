<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_reactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('commentaire_id');
            $table->enum('reaction', ['like', 'dislike']);
            $table->timestamps();

            $table->unique(['user_id', 'commentaire_id']); // Assure qu'un utilisateur ne peut réagir qu'une seule fois à un commentaire

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_reactions');
    }
};