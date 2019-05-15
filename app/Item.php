<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    /**
     * Class Item
     * @package App
     */
    class Item extends Model
    {

        /**
         * @var array
         */
        protected $fillable = [
            'list_id',
            'detail',
            'deadline'
        ];

        /**
         * @var array
         */
        protected $casts = [
            'deadline' => 'datetime',
        ];

        /**
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function list(): BelongsTo
        {
            return $this->belongsTo(Lists::class);
        }
    }
