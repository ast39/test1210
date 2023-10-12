<?php

namespace App\Enums;

/**
 * Допустимые валюты
 */
enum CurrencyEnum: int {

    case RUB = 1;

    case USD = 2;

    case EUR = 3;
}
