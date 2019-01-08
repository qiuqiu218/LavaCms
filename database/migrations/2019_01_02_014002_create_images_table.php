<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('上传的会员id');
            $table->unsignedInteger('info_id')->comment('信息id')->default(0);
            $table->string('name', 30)->comment('文件名称');
            $table->string('path', 120)->comment('文件路径');
            $table->string('mime', 20)->comment('Mime类型');
            $table->unsignedInteger('size')->comment('文件大小');
            $table->unsignedTinyInteger('type')->comment('文件类型(1图片2媒体3附件)');
            $table->float('img_width', 7, 2)->comment('图片宽度')->default(0.00);
            $table->float('img_height', 7, 2)->comment('图片高度')->default(0.00);
            $table->unsignedTinyInteger('is_admin')->comment('是否管理员上传')->default(0);
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
