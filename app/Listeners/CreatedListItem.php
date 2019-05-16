<?php

namespace App\Listeners;

use App\Events\CreateListItem;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreatedListItem
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
     * @param  CreateListItem  $event
     * @return void
     */
    public function handle(CreateListItem $event)
    {
        auth()->user()->actions()->create([
            'text' => sprintf("%s oluşturuldu.", $event->item->detail)
        ]);
    }
}
