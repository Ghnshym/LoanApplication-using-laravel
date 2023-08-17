<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class LoanApplicationAccepted extends Notification
{
    use Queueable;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Loan Application Accepted by administrator')
            ->line('Your loan application has been accepted.')
            ->line('Congratulations! Your loan request has been approved.');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
