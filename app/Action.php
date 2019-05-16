<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    /**
     * Class Action
     * @package App
     */
    class Action extends Model
    {

        /**
         * @var array
         */
        protected $fillable = [
            'user_id',
            'text'
        ];
    }
