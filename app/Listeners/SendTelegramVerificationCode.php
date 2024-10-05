<?php

namespace App\Listeners;

use App\Services\RabbitMQProducer;
use App\Services\TelegramBot;
use Illuminate\Auth\Events\Registered;

class SendTelegramVerificationCode
{
    protected TelegramBot $telegramBot;

    public function __construct(TelegramBot $telegramBot)
    {
        $this->telegramBot = $telegramBot;
    }

    public function handle(Registered $event)
    {
        $user = $event->user;
        $verificationCode = rand(100000, 999999);
        // Сохраняем код для юзера
        $user->update(['verification_code' => $verificationCode]);

        // Отправляем код через телеграм-бота посредством rabbit`a
        $rabbitMQProducer = new RabbitMQProducer();
        $message = "Code for $user->name: $verificationCode";
        // отправляем в очередь сообщение
        $rabbitMQProducer->send($message);
    }
}
