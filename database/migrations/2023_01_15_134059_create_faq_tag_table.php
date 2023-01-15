<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('f_a_q_item_id')->unsigned();
            $table->unsignedBiginteger('tag_id')->unsigned();

            $table->foreign('f_a_q_item_id')
                ->references('id')
                ->on('f_a_q_items');
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags');

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
        Schema::dropIfExists('faq_tag');
    }
}
