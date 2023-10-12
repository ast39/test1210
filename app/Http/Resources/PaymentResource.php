<?php

namespace App\Http\Resources;

use App\Http\Libs\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class PaymentResource extends JsonResource {

    public static $wrap = 'data';

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'payment_id' => $this->payment_id ?? null,
            'currency'   => $this->currency   ?? null,
            'amount'     => $this->amount     ?? null,
            'amount_in_rub' => Helper::convertToRub($this->amount, $this->currency, $this->created_at),
            'ticket'     => $this->ticket     ?? null,
            'payment_time' => date('d/m/Y', $this->created_at),
            'payer'      => new UserResource($this->payer),
        ];
    }
}
