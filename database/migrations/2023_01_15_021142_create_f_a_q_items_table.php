<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFAQItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_a_q_items', function (Blueprint $table) {
            $table->id();
            $table->string("question");
            $table->string("answer");
            $table->unsignedBigInteger('f_a_q_category_id');
            $table->foreign('f_a_q_category_id')
                ->references("id")
                ->on('f_a_q_categories')
                ->onDelete('cascade');
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
        Schema::dropIfExists('f_a_q_items');
    }
}
