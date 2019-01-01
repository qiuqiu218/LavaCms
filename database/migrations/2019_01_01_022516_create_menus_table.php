<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('menus', function(Blueprint $table) {
        $table->increments('id');
        $table->integer('parent_id')->comment('父级id')->nullable();
        $table->integer('lft')->comment('左边界')->nullable();
        $table->integer('rgt')->comment('右边界')->nullable();
        $table->integer('depth')->comment('深度')->nullable();
        $table->string('title', 30)->comment('菜单标题');
        $table->string('description', 120)->comment('菜单描述')->nullable();
        $table->string('route', 120)->comment('路由')->nullable();
        $table->unsignedTinyInteger('type')->comment('菜单类型(0=通用1=系统菜单)')->nullable();
        $table->unsignedSmallInteger('sort')->comment('排序')->nullable();
        $table->timestamps();

        $table->index('parent_id');
        $table->index('lft');
        $table->index('rgt');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('menus');
  }

}
