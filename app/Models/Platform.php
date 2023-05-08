<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Platform extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'coin_id',
        'name',
        'address',
        'description',
        'slug',
    ];

    /**
     * @return Coin
     */
    public function coin(): Coin {
        return $this->belongs(Coin::class);
    }
}
