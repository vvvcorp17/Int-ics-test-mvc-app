<?php

namespace App\Model;

use App\Repository\MessageRepository;

/**
 *
 */
class Message
{
    /**
     * @var int
     */
    private int $id;
    /**
     * @var string
     */
    private string $body;

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }
}