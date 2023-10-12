<?php

namespace App\Http\Libs;

use App\Enums\CurrencyEnum;

class Helper {

    /**
     * @param string|null $currency
     * @return int|null
     */
    public static function getCurrencyId(?string $currency):? int
    {
        if (is_null($currency)) {
            return CurrencyEnum::RUB->value;
        }

        foreach (CurrencyEnum::cases() as $item) {
            if ($item->name == strtoupper($currency)) {
                return $item->value;
            }
        }

        return null;
    }

    /**
     * @param int $date
     * @return array
     */
    public static function getRates(int $date): array
    {
        $usd = $eur = 0;
        $xml = simplexml_load_file('http://www.cbr.ru/scripts/XML_daily.asp?date_req=' . date('d/m/Y', $date));

        if (!empty($xml)) {
            foreach ($xml->Valute as $item) {
                if ($item['ID'] == 'R01235') {
                    $usd = $item->Value;
                } elseif ($item['ID'] == 'R01239') {
                    $eur = $item->Value;
                }
            }

            if (!empty($usd) && !empty($eur)) {
                $usd = str_replace(',', '.', $usd);
                $eur = str_replace(',', '.', $eur);
            }
        }

        return [

            'USD' => $usd,
            'EUR' => $eur,
        ];
    }

    /**
     * @param float $amount
     * @param string $currency
     * @param int $payment_time
     * @return float
     */
    public static function convertToRub(float $amount, string $currency, int $payment_time): float
    {
        $rates = self::getRates($payment_time);

        return ($rates[$currency] ?? 1) * $amount;
    }
}
