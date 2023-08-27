<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('会社名');
            $table->string('branch_name')->nullable()->comment('事業所');
            $table->string('postal_code')->nullable()->comment('郵便番号');
            $table->text('address')->nullable()->comment('住所');
            $table->string('tel')->nullable()->comment('電話番号');
            $table->string('fax')->nullable()->comment('FAX');
            $table->string('email')->nullable()->comment('Email');
            $table->string('website')->nullable()->comment('会社URL');
            $table->string('industry')->nullable()->comment('業種');
            $table->string('capital')->nullable()->comment('資本金');
            $table->string('number_of_employees')->nullable()->comment('従業員数');
            $table->string('annual_sales')->nullable()->comment('年商');
            $table->string('listed')->nullable()->comment('上場しているかどうか');
            $table->string('established_at')->nullable()->comment('設立日');
            $table->string('corporate_number')->nullable()->comment('法人番号');
            $table->unsignedTinyInteger('prospect_rating')->nullable()->comment('見込み度');
            $table->unsignedBigInteger('employee_id')->nullable()->comment('テレアポ担当者ID');
            $table->unsignedBigInteger('company_group_id')->nullable()->comment('企業グループID');
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('set null');
            $table->foreign('company_group_id')->references('id')->on('company_groups')->onDelete('set null');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
            $table->dropForeign(['company_group_id']);
        });
        Schema::dropIfExists('companies');
    }
};
