<?php

namespace App\Handlers;

/**
 *
 */
class OutputData
{
    /**
     * @var array
     */
    private static array $data;

    /**
     * @param string $key
     * @return array|string|int|null
     */
    public static function get(string $key): null|array|string|int
    {
        return self::$data[$key] ?? null;
    }

    /**
     * @param array $data
     * @return void
     */
    public static function setData(array $data): void
    {
        foreach ($data as $key => $value) {
            self::$data[$key] = $value;
        }
    }
}