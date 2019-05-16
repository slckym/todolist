<?php

namespace App\Listeners;

use App\Events\DeleteListItem;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeletedListItem
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DeleteListItem  $event
     * @return void
     */
    public function handle(DeleteListItem $event)
    {
        auth()->user()->actions()->create([
            'text' => sprintf("%s silindi.", $event->item->detail)
        ]);
    }
}
