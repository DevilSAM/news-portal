<?php

namespace App\Services;

use Exception;
use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramSDKException;

class TelegramBot
{
    protected Api $telegram;
    protected int $groupId;

    public function __construct()
    {
        $this->telegram = new Api();
        $this->groupId = env('TELEGRAM_GROUP_ID');
    }

    /**
     * Отправить сообщение в группу
     *
     * @param string $message
     * @return void
     * @throws TelegramSDKException
     * @throws Exception
     */
    public function sendVerificationToken(string $message): void
    {
        if (!$this->groupId) {
            throw new Exception('Group ID not specified');
        }

        $this->telegram->sendMessage([
            'chat_id' => $this->groupId,
            'text' => $message,
        ]);
    }

    public function test()
    {
        $updates = $this->telegram->getUpdates();
        print_r($updates);
    }

}
