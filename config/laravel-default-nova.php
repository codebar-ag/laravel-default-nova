<?php

return [

    'prevent_lazy_loading' => false,
    'with_breadcrumbs' => true,
    'without_notifications' => false,
    'resource_in' => 'Nova/Models',

    //'initial_path' => '/resources/users',
    //'assets' => ['js/nova.js', 'css/nova.css'],

    'policies' => [
        'namespace' => 'App\\Policies\\Nova\\',
    ],

];
