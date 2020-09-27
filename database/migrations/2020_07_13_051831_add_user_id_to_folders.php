<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToFolders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //user_idカラムを追加
        Schema::table('folders', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();

            //外部キーを設定する
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //user_idカラムを削除
        Schema::table('folders', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
