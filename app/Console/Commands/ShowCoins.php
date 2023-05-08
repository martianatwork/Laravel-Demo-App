<?php

namespace App\Console\Commands;

use App\Models\Coin;
use Illuminate\Console\Command;

class ShowCoins extends Command
{
    protected $signature = 'show:coins {--per_page=10}';

    protected $description = 'Show coins as table';

    public function handle() {
        $per_page = $this->option('per_page');
        $this->table([
            'name',
            'symbol',
        ], Coin::withCount('platforms')->take($per_page)->select([
            'name', 'symbol'
        ])->get());
    }
}
