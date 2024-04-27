<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\ExchangeRateDetail;

class ExchangeRate extends Model
{
    use HasFactory;
    protected $table = 'exchange_rate';
    protected $primaryKey = 'id_exchange';
    protected $keyType = 'string';
    protected $fillable = [
        'id_exchange',
        'timestamp',
        'base',
        'date',
        'created_at',
        'updated_at'
    ];

    public function detail(): HasMany
    {
        return $this->hasMany(ExchangeRateDetail::class, 'id_exchange', 'id_exchange');
    }
}
