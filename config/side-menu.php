<?php
return [
    [
        'icon' => 'fa fa-home',
        'route' => "/",
        'title' => 'Dashboard',
        'active' => 'dashboard.dashboard',
        'count' => 0,
        'sub_menu' => []
    ],
    [
        'icon' => 'fa fa-user',
        'route' => "#",
        'title' => 'Users',
        'active' => 'dashboard.dashboard',
        'count' => 0,
        'sub_menu' => [
            [
                'icon' => 'la la-home',
                'route' => "/users",
                'title' => 'Show All',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => []
            ],
            [
                'icon' => 'la la-home',
                'route' => "/users/create",
                'title' => 'Add New',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => []
            ],
        ]
    ],
    [
        'icon' => 'fa fa-money',
        'route' => "#",
        'title' => 'Transactions',
        'active' => 'dashboard.dashboard',
        'count' => 0,
        'sub_menu' => [
            [
                'icon' => 'la la-home',
                'route' => "/transactions",
                'title' => 'Show All',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => []
            ],
            [
                'icon' => 'la la-home',
                'route' => "/transactions/create",
                'title' => 'Add New',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => []
            ],
        ]
    ],
];