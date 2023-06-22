<?php

namespace App\Handlers\Notifier;

class DTO
{
    public function __construct(
        private readonly string $source,
        private readonly string $message
    )
    {

    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}