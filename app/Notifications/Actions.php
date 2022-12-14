<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Actions extends Notification
{
    use Queueable;

    public $type;
    public $subject;
    public $url;

    /**
     * Actions constructor.
     * @param $type string mail or database
     * @param $subject string Email subject
     * @param $url
     */
    public function __construct($type,$subject,$url)
    {
        $this->type = $type;
        $this->subject = $subject;
        $this->url = $url;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [$this->type];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject($this->subject)
                    ->line($this->subject)
                    ->action('Click to view', url($this->url))
                    ->line('Thank you for using our website!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'id'=>$this->id,
            'type'=>$this->type,
            'subject'=>$this->subject,
            'url'=>$this->url
        ];
    }
}
