<?php

namespace App\Handlers;

/**
 *
 */
class DB
{
    /**
     * @var \PDO|null
     */
    private static ?\PDO $connect = null;

    /**
     *
     */
    private function __construct()
    {
    }

    /**
     * @return void
     */
    public static function initConnect(): void
    {
        try {
            self::$connect = new \PDO("mysql:host=mysql;port=3306;dbname=test_database", "username", "password");
        } catch (\Exception $error) {
            echo $error->getMessage();
        }
    }

    /**
     * @param string $sql
     * @param array $parameters
     * @return array|false
     */
    public static function fetchAll(string $sql, array $parameters = []): bool|array
    {
        if (!self::$connect) {
            self::initConnect();
        }

        $db = self::$connect->prepare($sql);
        $db->execute($parameters);
        $result = $db->fetchAll(\PDO::FETCH_OBJ);


        return $result;
    }

    /**
     * @param string $sql
     * @param array $parameters
     * @return void
     */
    public static function save(string $sql, array $parameters = []): void
    {
        if (!self::$connect) {
            self::initConnect();
        }

        $db = self::$connect->prepare($sql);
        $db->execute($parameters);
    }
}