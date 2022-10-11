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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id')->index();
            $table->unsignedBigInteger('category_id')->index();
            $table->string('title');
            $table->string('slug');
            $table->string('thumb')->nullable();
            $table->text('description');
            $table->longText('content');
            $table->smallInteger('status')->index()->comment('PUBLISHED/DRAFT');
            $table->timestamps();
            $table->foreign("category_id")->references("id")->on("categories");
            $table->foreign("author_id")->references("id")->on("users");
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
};
