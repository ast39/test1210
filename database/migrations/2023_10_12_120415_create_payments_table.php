<?php

use App\Enums\CurrencyEnum;
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
        Schema::create('payments', function (Blueprint $table) {

            $table->id('payment_id')
                ->comment('ID платежа');

            $table->float('amount')
                ->comment('Сумма платежа');

            $table->unsignedTinyInteger('currency_id')
                ->default(CurrencyEnum::RUB->value)
                ->comment('ID валюты платежа');

            $table->unsignedBigInteger('owner_id')
                ->comment('Плательщик');

            $table->unsignedBigInteger('ticket')
                ->nullable()
                ->default(null)
                ->comment('Номер кассового чека');

            $table->timestamps();

            $table->comment('Платежи');
        });

        Schema::table('payments', function(Blueprint $table) {

            $table->foreign('owner_id', 'payment_owner_key')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
