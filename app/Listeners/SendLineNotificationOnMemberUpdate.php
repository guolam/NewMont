<?php

namespace App\Listeners;

use App\Events\MemberUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendLineNotificationOnMemberUpdate
{
    private $lineNotify;

    public function __construct(LineNotify $lineNotify)
    {
        $this->lineNotify = $lineNotify;
    }

    public function handle(MemberUpdated $event)
    {
        $mentor = $event->member;
        $message = "メンバーが更新されました: {$member->name}";
        $this->lineNotify->send($message);
    }
    
    

    /**
     * Handle the event.
     *
     * @param  \App\Events\MemberUpdated  $event
     * @return void
     */
    // public function handle(MemberUpdated $event)
    // {
    //     //
    // }
}
