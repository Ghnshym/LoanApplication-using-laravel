<?php
namespace App\Traits;

trait NotificationRecipient
{
    public function routeNotificationFor($channel)
    {
        if ($channel === 'mail') {
            return $this->email; // Replace with the actual field name containing email addresses
        }
        // You can implement additional logic for other channels if needed
    }
}
