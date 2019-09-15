<?php

namespace Woodoocoder\LaravelMedia\Controllers;

use Illuminate\Http\Request;
use Woodoocoder\LaravelHelpers\Api\Controller;
use Woodoocoder\LaravelMedia\Repository\CollectionRepository;

class MediaController extends Controller {
	
    public function index(CollectionRepository $collectionRepo) {
        return $collectionRepo->paginateByUser();
    }
}
