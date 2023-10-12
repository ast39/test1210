<?php

namespace App\Models;

use App\Enums\CurrencyEnum;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Payment extends Model {

    use HasFactory, Filterable;


    protected $table         = 'payments';

    protected $primaryKey    = 'payment_id';

    protected $keyType       = 'int';


    public    $incrementing  = true;

    public    $timestamps    = true;


    /**
     * Order owner
     *
     * @return BelongsTo
     */
    public function payer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }


    /**
     * Currency abbr
     *
     * @return string
     */
    public function getCurrencyAttribute(): string
    {
        return current(array_filter(CurrencyEnum::cases(), function($e) {
            return $e->value == $this->currency_id;
        }))->name;
    }


    protected $with = [
       'payer'
    ];

    protected $appends = [
        'currency',
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    protected $fillable = [
        'payment_id', 'owner_id', 'amount', 'currency_id', 'ticket',
        'created_at', 'updated_at',
    ];

    protected $hidden = [
        //
    ];
}
