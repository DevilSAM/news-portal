<?php

namespace App\Console\Commands;

use App\Services\RabbitMQConsumer;
use Exception;
use Illuminate\Console\Command;

class CodeReceiverWorker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:send-codes';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Рассылать коды в телегу';

    /**
     * @throws Exception
     */
    public function handle()
    {
        $consumer = new RabbitMQConsumer();
        $consumer->consume();
    }
}
