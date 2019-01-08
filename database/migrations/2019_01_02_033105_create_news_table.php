<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text', 30)->comment('文本')->nullable();
            $table->string('password', 30)->comment('密码框')->nullable();
            $table->string('select')->comment('下拉框')->nullable();
            $table->string('linkage_select')->comment('联动下拉框')->nullable();
            $table->string('radio')->comment('单选')->nullable();
            $table->string('checkbox')->comment('复选')->nullable();
            $table->string('editor')->comment('编辑器')->nullable();
            $table->string('image')->comment('单图上传')->nullable();
            $table->string('images')->comment('多图')->nullable();
            $table->string('file')->comment('单文件上传')->nullable();
            $table->string('files')->comment('多文件上传')->nullable();
            $table->string('date')->comment('日期')->nullable();

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
        Schema::dropIfExists('news');
    }
}
