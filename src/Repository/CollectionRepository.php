<?php

namespace Woodoocoder\LaravelMedia\Repository;

use Woodoocoder\LaravelHelpers\DB\Repository;
use Woodoocoder\LaravelMedia\Model\Collection;

class CollectionRepository extends Repository {
    
    /**
     * @param Collection $collection
     */
    public function __construct(Collection $collection) {
        parent::__construct($collection);
        
    }
}
