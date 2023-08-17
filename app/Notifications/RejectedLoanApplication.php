<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\loan_application;

class RejectedLoanApplication extends Notification
{
    use Queueable;

    protected $user;
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Loan Application Rejected by Administrator')
            ->line('Your loan application has been rejected for some reason.')
            ->line('Reason: ' . $this->user->reject_reason);
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}