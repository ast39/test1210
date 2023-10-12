<?php

namespace Database\Seeders;

use App\Enums\CurrencyEnum;
use App\Models\Payment;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::create([
            'owner_id'    => 1,
            'amount'      => 100,
            'currency_id' => CurrencyEnum::EUR->value,
            'ticket'      => 123456,
        ]);

        Payment::create([
            'owner_id'    => 2,
            'amount'      => 200,
            'currency_id' => CurrencyEnum::USD->value,
        ]);

        Payment::create([
            'owner_id'    => 3,
            'amount'      => 5000,
            'ticket'      => 456789,
        ]);
    }
}
