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
        Schema::create('billing_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id'); 
            $table->string('name1')->nullable(); 
            $table->string('name1Kana');
            $table->string('address');
            $table->string('tel');
            $table->string('depertment');
            $table->string('name2');
            $table->string('name2Kana');
            $table->timestamps();
        
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing_addresses');
    }
};


