<?php

namespace App\Console\Commands;

use App\Models\Coin;
use App\Service\CoinGecko;
use Illuminate\Console\Command;

class ImportCoinGeckoMarketsCommand extends Command
{
    protected $signature = 'import:coin-gecko-markets';

    protected $description = 'Import CoinGecko markets';

    public function handle() {
        $this->info('Starting...');
        try {
            $this->info('Fetching coins...');
            $response = CoinGecko::request('get', '/coins/list', [
                'include_platform' => true,
            ]);
            $this->info('Importing...');
            $this->withProgressBar($response, function ($item) {
                $coin = Coin::firstOrCreate([
                    'slug' => $item['id'],
                ], [
                    'name' => $item['name'],
                    'symbol' => $item['symbol'],
                ]);
                foreach ($item['platforms'] ?? [] as $platform => $address) {
                    $coin->platforms()->firstOrCreate([
                        'coin_id' => $coin->id,
                        'slug' => $platform,
                    ],[
                        'name' => \Str::title($platform),
                        'address' => $address,
                    ]);
                }
            });
            $this->newLine();
            $this->info('Coins Imported!');
        } catch (\Exception $e) {
            $this->error('Got API Error:');
            $this->error($e->getMessage());
        }
    }
}
