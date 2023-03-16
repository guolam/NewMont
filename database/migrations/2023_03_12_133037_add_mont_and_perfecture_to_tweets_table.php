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
        Schema::table('tweets', function (Blueprint $table) {
            //
            $table->text('perfecture')->after('user_id')->constrained()->cascadeOnDelete();
            $table->text('mont')->after('perfecture')->nullable()->constrained()->cascadeOnDelete();
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tweets', function (Blueprint $table) {
            //
            $table->dropColumn(['perfecture']);
            $table->dropColumn(['mont']);
        });
    }
};
