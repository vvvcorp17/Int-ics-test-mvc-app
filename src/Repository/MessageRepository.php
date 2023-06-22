<?php

namespace App\Repository;

use App\Handlers\DB;
use App\Handlers\Notifier\DTO;
use App\Handlers\Notifier\Email;
use App\Handlers\Notifier\Notifier;
use App\Handlers\Notifier\Sms;
use App\Handlers\Validators\MessageValidator;
use App\Model\Message;

/**
 *
 */
class MessageRepository
{
    /**
     * @param Message $message
     * @return void
     */
    public function save(Message $message): void
    {
        (new MessageValidator($message))->validate();

        DB::save("insert `message` set `body` = :body", ['body' => $message->getBody()]);

        // TODO find out where we get the email and phone number from
        (new Notifier())->notify(new Email(), new DTO('testemail@gmail.com', $message->getBody()));
        (new Notifier())->notify(new Sms(), new DTO('+37379910290', $message->getBody()));
    }

    /**
     * TODO pagination
     * @param int $limit
     * @param int $offset
     * @return array
     */
    public function getAll(int $limit = 25, int $offset = 0): array
    {
        $messages = DB::fetchAll("select * from `message` order by `id` DESC -- limit");

        $response= [];
        foreach ($messages as $entity) {
            $message = new Message();
            $message->setBody($entity->body);
            $message->setId($entity->id);
            $response[] = $message;
        }

        return $response;
    }
}