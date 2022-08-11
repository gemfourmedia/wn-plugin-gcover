<?php namespace GemFourMedia\GCover\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateGemfourmediaCoverMedia extends Migration
{
    public function up()
    {
        Schema::create('gemfourmedia_cover_media', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('cover_id')->unsigned();
            $table->string('title', 255)->nullable();
            $table->string('subtitle', 255)->nullable();
            $table->text('desc')->nullable();
            $table->text('embed')->nullable();
            $table->text('params')->nullable();
            $table->integer('sort_order')->default(1);
            $table->string('type', 30);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('gemfourmedia_cover_media');
    }
}
