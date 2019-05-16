<?php

    namespace App\Listeners;

    use App\Events\ChangeListItem;

    class ChangedListItem
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
         * @param ChangeListItem $event
         *
         * @return void
         */
        public function handle(ChangeListItem $event)
        {
            $t = auth()->user()->actions()->create([
                'text' => sprintf("%s değiştirildi.", $event->item->detail)
            ]);
        }
    }
