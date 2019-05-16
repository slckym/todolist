<?php

    namespace App\Events;

    use App\Item;
    use Illuminate\Broadcasting\InteractsWithSockets;
    use Illuminate\Foundation\Events\Dispatchable;
    use Illuminate\Queue\SerializesModels;

    /**
     * Class ChangeListItem
     * @package App\Events
     */
    class ChangeListItem
    {

        use Dispatchable, InteractsWithSockets, SerializesModels;

        /**
         * @var \App\Item
         */
        public $item;

        /**
         * Create a new event instance.
         *
         * @param \App\Item $item
         */
        public function __construct(Item $item)
        {
            $this->item = $item;
        }

    }
