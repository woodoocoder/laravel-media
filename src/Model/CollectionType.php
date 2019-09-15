<?php

namespace Woodoocoder\LaravelMedia\Model;

use Illuminate\Database\Eloquent\Model;

class CollectionType extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'collection_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function __construct(array $attributes = []) {
        $this->table = config('woodoocoder.media.table_prefix').$this->table;
        parent::__construct($attributes);
    }
}
