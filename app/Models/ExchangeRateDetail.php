<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class ExchangeRateDetail extends Model
{
    use HasFactory;
    protected $table = 'exchange_rate_detail';
    protected $primaryKey = 'id_exchange_detail';
    protected $keyType = 'string';
    protected $fillable = [
        'id_exchange_detail',
        'id_exchange',
        'currency_name',
        'exchange_rate',
        'created_at',
        'updated_at'
    ];

    public function exchange(): BelongsTo
    {
        return $this->belongsTo(ExchangeRate::class, 'id_exchange', 'id_exchange');
    }
}
