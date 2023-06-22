<?php

namespace App\Handlers\Notifier;

interface NotificationInterface
{
    public function notify(DTO $data);
}