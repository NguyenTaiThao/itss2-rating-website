<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('logo_path')->nullable();
            $table->unsignedBigInteger('company_category_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->boolean("is_active")->default(0);
            $table->timestamps();

            $table->foreign('company_category_id')->references('id')->on('company_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
