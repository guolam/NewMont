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
        Schema::create('group_user', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('group_id');
        $table->unsignedBigInteger('user_id');
        

        $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        $table->unique(['group_id', 'user_id']); // 同じユーザーが同じグループに複数回登録されないようにする
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
        Schema::dropIfExists('group_user');{
            
        }
    }
};
