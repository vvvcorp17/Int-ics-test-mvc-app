<?php

namespace App\Handlers;

/**
 * clacc CSRF
 */
class CSRF
{
    /**
     * @param Request $request
     * @return bool
     */
    public static function check(Request $request): bool
    {
        if ($request->isPost() && $request->get('csrf') === $_SESSION['token']) {
            return true;
        }

        if (!$request->isPost()) {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public static function token(): string
    {
        return $_SESSION['token'] = md5(uniqid(mt_rand(100, 300), true));
    }
}