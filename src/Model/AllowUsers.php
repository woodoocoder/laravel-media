<?php

namespace Woodoocoder\LaravelMedia\Model;

use Illuminate\Database\Eloquent\Model;

class AllowUsers extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'allow_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'collection_id',
        'user_id',
    ];

    public function __construct(array $attributes = []) {
        $this->table = config('woodoocoder.media.table_prefix').$this->table;
        parent::__construct($attributes);
    }
}
