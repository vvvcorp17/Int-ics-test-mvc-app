<?php

namespace App\Handlers\Notifier;

/**
 *
 */
class Notifier
{
    /**
     * @param NotificationInterface $notification
     * @param DTO $data
     * @return void
     */
    public function notify(NotificationInterface $notification, DTO $data): void
    {
        $notification->notify($data);
    }
}