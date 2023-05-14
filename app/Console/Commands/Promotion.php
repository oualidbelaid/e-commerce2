<?php

namespace App\Console\Commands;

use App\Models\Promotion as ModelsPromotion;
use Illuminate\Console\Command;

class Promotion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:promotion';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delet the promotion of the product every 5 minuts ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Category::create([
        //     "name" => "momo", date("Y-m-d"),
        // ]);
        $promotions = ModelsPromotion::all();
        foreach ($promotions as $promotion) {
            if ($promotion->expiry_date == date("Y-m-d")) {
                $promotion->delete();
            }
        }

    }
}
