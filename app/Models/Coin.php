<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Coin extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'slug',
        'symbol',
        'name',
    ];

    /**
     * @return HasMany|Collection|Platform[]
     */
    public function platforms(): array|HasMany|Collection {
        return $this->hasMany(Platform::class);
    }
}
