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
        Schema::table('activity_log', function ($table) {
            $table->string('subject_type', 125)->change();
            $table->string('causer_type', 125)->change();
        });
        Schema::table('contacts', function ($table) {
            $table->string('name', 125)->change();
            $table->string('email', 125)->change();
            $table->string('phone', 125)->change();
            $table->string('subject', 125)->change();
        });
        Schema::table('failed_jobs', function ($table) {
            $table->string('uuid', 125)->change();
        });
        Schema::table('menus', function ($table) {
            $table->string('name', 125)->change();
        });
        Schema::table('migrations', function ($table) {
            $table->string('migration', 125)->change();
        });
        Schema::table('model_has_permissions', function ($table) {
            $table->string('model_type', 125)->change();
        });
        Schema::table('model_has_roles', function ($table) {
            $table->string('model_type', 125)->change();
        });
        Schema::table('orders', function ($table) {
            $table->string('name', 125)->change();
            $table->string('email', 125)->change();
            $table->string('email', 125)->change();
        });
        Schema::table('pages', function ($table) {
            $table->string('title', 125)->change();
            $table->string('slug', 125)->change();
        });
        Schema::table('password_resets', function ($table) {
            $table->string('email', 125)->change();
            $table->string('token', 125)->change();
        });
        Schema::table('permissions', function ($table) {
            $table->string('name', 125)->change();
            $table->string('guard_name', 125)->change();
        });
        Schema::table('personal_access_tokens', function ($table) {
            $table->string('tokenable_type', 125)->change();
            $table->string('name', 125)->change();
        });
        Schema::table('posts', function ($table) {
            $table->string('title', 125)->change();
            $table->string('slug', 125)->change();
            $table->string('image', 125)->change();
        });
        Schema::table('post_categories', function ($table) {
            $table->string('name', 125)->change();
        });
        Schema::table('products', function ($table) {
            $table->string('leves', 125)->change();
            $table->string('a_menu', 125)->change();
            $table->string('b_menu', 125)->change();
        });
        Schema::table('roles', function ($table) {
            $table->string('name', 125)->change();
            $table->string('guard_name', 125)->change();
        });
        Schema::table('users', function ($table) {
            $table->string('name', 125)->change();
            $table->string('email', 125)->change();
            $table->string('password', 125)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
