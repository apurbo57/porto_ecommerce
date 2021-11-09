<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('model')->nullable();
            $table->decimal('buing_price',8,2);
            $table->decimal('selling_price',8,2);
            $table->decimal('special_price',8,2)->nullable();
            $table->date('special_price_from')->nullable();
            $table->date('special_price_to')->nullable();
            $table->integer('quantity');
            $table->string('sku_code');
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->longText('thumbnail');
            $table->string('images')->nullable();
            $table->tinyInteger('warranty')->default(0)->comment('0 no and 1 yes');
            $table->string('warranty_duration')->nullable();
            $table->string('warranty_condition')->nullable();
            $table->longText('description');
            $table->enum('status', ['active','inactive'])->default('active');
            $table->unsignedBigInteger('create_by');
            $table->timestamps();
            $table->foreign('category_id')->on('categories')->references('id')->onDelete('cascade');
            $table->foreign('brand_id')->on('brands')->references('id')->onDelete('cascade');
            $table->foreign('create_by')->on('users')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
