<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;


class PaymentFilter extends AbstractFilter {

    public const OWNER     = 'owner';
    public const CURRENCY  = 'currency';
    public const TICKET    = 'ticket';

    /**
     * @return array[]
     */
    protected function getCallbacks(): array
    {
        return [
            self::OWNER     => [$this, 'owner'],
            self::CURRENCY  => [$this, 'currency'],
            self::TICKET    => [$this, 'ticket'],
        ];
    }

    /**
     * @param Builder $builder
     * @param $value
     * @return void
     */
    public function owner(Builder $builder, $value): void
    {
        $builder->where('owner_id', $value);
    }

    /**
     * @param Builder $builder
     * @param $value
     * @return void
     */
    public function currency(Builder $builder, $value): void
    {
        $builder->where('currency_id', $value);
    }

    /**
     * @param Builder $builder
     * @param $value
     * @return void
     */
    public function ticket(Builder $builder, $value): void
    {
        $builder->where('ticket', $value);
    }

}
