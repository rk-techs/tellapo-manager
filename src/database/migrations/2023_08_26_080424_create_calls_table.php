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
        Schema::create('calls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->comment('企業ID');
            $table->unsignedBigInteger('employee_id')->comment('TEL担当者ID');
            $table->dateTime('called_at')->comment('TEL日時');
            $table->unsignedTinyInteger('result')->comment('TEL結果');
            $table->string('receiver_info')->nullable()->comment('TEL相手情報');
            $table->text('notes')->nullable()->comment('メモ');
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('restrict');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calls');
    }
};
