<?php

namespace App\Swagger\Models;

/**
 * @OA\Schema(
 *     type="object",
 *     schema="payment",
 *     title="Payment data",
 *     @OA\Property(property="payment_id", type="integer", example="1"),
 *     @OA\Property(property="curency", type="string", example="USD"),
 *     @OA\Property(property="amount", type="numeric", format="float", example="50.50"),
 *     @OA\Property(property="amount_in_rub", type="numeric", format="float", example="5050"),
 *     @OA\Property(property="ticket", type="integer", nullable="true", example="123456"),
 *     @OA\Property(property="payer", ref="#/components/schemas/user"),
 * )
 */
class b1Payment {}
