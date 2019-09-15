<?php

namespace Woodoocoder\LaravelMedia\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model {
    
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'collections';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_id',
        'user_id',
        'name',
    ];

    public function __construct(array $attributes = []) {
        $this->table = config('woodoocoder.media.table_prefix').$this->table;
        parent::__construct($attributes);
    }

}
