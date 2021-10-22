<?php

namespace App\Notifications;

use App\Models\Project;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DeleteProjectNotification extends Notification
{
    use Queueable;

    private $projectName;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($projectName)
    {
        $this->projectName = $projectName;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            ->subject('Delete project')
            ->greeting('Dear, ' . $this->user->getName())
            ->line('You have deleted the project ' . $this->project->getName() . " recently")
            ->line('You can create new one at the web-site or right here')
            ->action('Create projects', url('/createProject'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'projectName' => $this->projectName,
        ];
    }
}
