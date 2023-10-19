<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); // This will create an auto-incrementing ID column
            $table->unsignedBigInteger('user_id'); // For foreign key relationship with users table
            $table->string('title_en'); // English title of the article
            $table->string('title_fr'); // French title of the article
            $table->text('content_en'); // English content of the article
            $table->text('content_fr'); // French content of the article
            $table->date('date'); // Date of the article
            $table->timestamps(); // This will create `created_at` and `updated_at` columns

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
