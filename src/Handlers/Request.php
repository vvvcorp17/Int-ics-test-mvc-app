<?php

namespace App\Handlers;

/**
 *
 */
class Request
{
    /**
     * @var array
     */
    private array $data = [];
    /**
     * @var bool
     */
    private bool $isGet = false;
    /**
     * @var bool
     */
    private bool $isPost = false;

    public function __construct()
    {
        $this->data = ($_GET + $_POST);

        foreach ($this->data as $key => &$value) {
            $value = htmlspecialchars($value, ENT_QUOTES);
        }

        $this->isGet = (bool)$_GET;
        $this->isPost = (bool)$_POST;
    }

    /**
     * @param string $property
     * @return mixed
     */
    public function get(string $property): mixed
    {
        return $this->data[$property] ?? null;
    }

    /**
     * @return bool
     */
    public function isPost(): bool
    {
        return $this->isPost;
    }

    /**
     * @return bool
     */
    public function isGet(): bool
    {
        return $this->isGet;
    }
}