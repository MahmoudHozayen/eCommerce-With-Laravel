<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *         Cat_ID Member_ID  
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';            
            $table->increments('id')->unsigned()->unique();
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->bigInteger('quantity');                
            $table->string('countryMade');
            $table->string('itemStatus');
            $table->integer('rating');
            $table->boolean('approvalStatus')->default(0);
            $table->boolean('bestSeller')->default(0);
            $table->boolean('featured')->default(1);
            $table->integer('sale')->default(0);
            $table->string('itemImg')->nullable();
            $table->string('tags')->nullable();
            $table->integer('member_id')->unsigned();
            $table->integer('cat_id')->unsigned();
            $table->foreign('member_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
