<?php

namespace Woodoocoder\LaravelMedia\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model {
    
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'files';

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
        'collection_id',
        'disk',
        'name',
        'file_name',
        'mime_type',
        'size',
    ];

    public function __construct(array $attributes = []) {
        $this->table = config('woodoocoder.media.table_prefix').$this->table;
        parent::__construct($attributes);
    }

}
