<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    /**
     * Class Lists
     * @package App
     */
    class Lists extends Model
    {

        /**
         * @var string
         */
        protected $table = "lists";

        /**
         * @var array
         */
        protected $fillable = [
            'user_id', 'slug', 'title'
        ];

        /**
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function items(): HasMany
        {
            return $this->hasMany(Item::class, 'list_id');
        }

        /**
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }
    }
