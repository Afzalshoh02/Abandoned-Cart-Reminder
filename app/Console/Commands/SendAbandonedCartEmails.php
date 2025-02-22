<?php

namespace App\Console\Commands;

use App\Events\CartAbandoned;
use App\Models\Cart;
use Illuminate\Console\Command;

class SendAbandonedCartEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send-abandoned-cart';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Отправка писем пользователям с брошенной корзиной';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $carts = Cart::where('updated_at', '<', now()->subHours(24))->get();

        foreach ($carts as $cart) {
            event(new CartAbandoned($cart));
        }

        $this->info('Обработка брошенных корзин завершена.');
    }
}
