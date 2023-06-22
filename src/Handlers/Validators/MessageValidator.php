<?php

namespace App\Handlers\Validators;

use App\Model\Message;

class MessageValidator
{
    public function __construct(
        private Message $message
    )
    {
    }

    /**
     * @return void
     */
    public function validate(): void
    {
        if (!$this->message->getBody()) {
            trigger_error('"body" is required', E_USER_ERROR);
        }

        $this->message->setBody(addslashes($this->message->getBody()));

        if (strlen($this->message->getBody()) > 1000 || strlen($this->message->getBody()) === 0) {
            trigger_error('"body" length is range, between 1 - 1000', E_USER_ERROR);
        }
    }
}