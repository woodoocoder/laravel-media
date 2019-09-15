<?php

return [

    'disk' => config('filesystems.default'),

    'table_prefix' => "media_",
    
    'default_collection_name' => "default",

    'user_model' => \App\User::class,

    'max_file_size' => 1024 * 1024 * 10,

    'image_sizes' => [
        [60, 60],
        [150, 150],
        [600, 600],
    ]
];
