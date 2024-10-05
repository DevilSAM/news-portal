<?php

namespace App\Services;

use Exception;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQConsumer
{
    protected AMQPChannel $channel;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->channel = RabbitMQConnection::getInstance()->getChannel();
        $this->channel->queue_declare('telegram', false, true, false, false);
    }

    public function consume(): void
    {
        // Обработка сообщений с ручным подтверждением
        $callback = function (AMQPMessage $msg) {
            try {
                // получаем сообщение
                $data = json_decode($msg->getBody(), true);

                // Пытаемся отправить письмо
                $bot = new TelegramBot();
                $bot->sendVerificationToken($data);

                // Подтверждаем успешную обработку сообщения
                $this->channel->basic_ack($msg->getDeliveryTag());
                echo " [x] Sent message {$data}\n";

                // Пауза в 1 секунду между отправками
                sleep(1);

            } catch (\Exception $e) {
                // Если произошла ошибка, сообщение не подтверждается
                echo " [!] Error sending code: {$e->getMessage()}\n";
                // отправить сообщение обратно в очередь
                $this->channel->basic_nack($msg->getDeliveryTag(), false, true);
            }
        };

        // Ограничиваем получение только одного сообщения за раз
        $this->channel->basic_qos(0, 1, null);

        // Включаем ручное подтверждение (false в третьем аргументе)
        $this->channel->basic_consume('telegram', '', false, false, false, false, $callback);

        // Начинаем обработку очереди
        while ($this->channel->is_consuming()) {
            $this->channel->wait();
        }
    }

    /**
     * @throws Exception
     */
    public function __destruct()
    {
        $this->channel->close();
    }
}
