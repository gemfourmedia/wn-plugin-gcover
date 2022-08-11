<?php namespace GemFourMedia\GCover\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateGemfourmediaCoverItem extends Migration
{
    public function up()
    {
        Schema::create('gemfourmedia_cover_item', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title', 255)->nullable();
            $table->string('subtitle', 255)->nullable();
            $table->text('desc')->nullable();
            $table->string('page', 255);
            $table->string('mode', 100);
            $table->text('content')->nullable();
            $table->text('params')->nullable();
            $table->boolean('published')->default(1);
            $table->integer('sort_order')->default(1);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gemfourmedia_cover_item');
    }
}
