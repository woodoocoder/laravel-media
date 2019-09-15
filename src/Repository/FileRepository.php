<?php

namespace Woodoocoder\LaravelMedia\Repository;

use Woodoocoder\LaravelHelpers\DB\Repository;
use Woodoocoder\LaravelMedia\Model\File;

class FileRepository extends Repository {
    
    /**
     * @param File $file
     */
    public function __construct(File $file) {
        parent::__construct($file);
        
    }
}
