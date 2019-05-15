<?php

    namespace App\Providers;

    use App\Events\ChangeListItem;
    use App\Events\CreateListItem;
    use App\Events\DeleteListItem;
    use App\Listeners\ChangedListItem;
    use App\Listeners\CreatedListItem;
    use App\Listeners\DeletedListItem;
    use Illuminate\Auth\Events\Registered;
    use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
    use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

    class EventServiceProvider extends ServiceProvider
    {

        /**
         * The event listener mappings for the application.
         *
         * @var array
         */
        protected $listen = [
            Registered::class     => [
                SendEmailVerificationNotification::class,
            ],
            ChangeListItem::class => [
                ChangedListItem::class
            ],
            CreateListItem::class => [
                CreatedListItem::class
            ],
            DeleteListItem::class => [
                DeletedListItem::class
            ]
        ];

        /**
         * Register any events for your application.
         *
         * @return void
         */
        public function boot()
        {
            parent::boot();
            //
        }
    }
