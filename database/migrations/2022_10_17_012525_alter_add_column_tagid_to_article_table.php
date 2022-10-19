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
        if (!Schema::hasColumn('articles','tag_id')){
            Schema::table('articles', function (Blueprint $table) {
                $table->unsignedBigInteger('tag_id')->index()->nullable()->after('status');
                $table->foreign("tag_id")->references("id")->on("tags");
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('articles','tag_id')){
            Schema::table('articles', function (Blueprint $table) {
                $table->dropColumn('tag_id');
            });
        }
    }
};
