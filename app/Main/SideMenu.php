<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        return [
            'dashboard' => [
                'icon' => 'home',
                'title' => 'Dashboard',
                'sub_menu' => [
                    'dashboard-overview-1' => [
                        'icon' => '',
                        'route_name' => 'dashboard-overview-1',
                        'params' => [
                            'layout' => 'side-menu',
                        ],
                        'title' => 'Overview 1'
                    ],
                    'dashboard-overview-2' => [
                        'icon' => '',
                        'route_name' => 'dashboard-overview-2',
                        'params' => [
                            'layout' => 'side-menu',
                        ],
                        'title' => 'Overview 2'
                    ],
                    'dashboard-overview-3' => [
                        'icon' => '',
                        'route_name' => 'dashboard-overview-3',
                        'params' => [
                            'layout' => 'side-menu',
                        ],
                        'title' => 'Overview 3'
                    ]
                ]
            ],
            'menu-layout' => [
                'icon' => 'box',
                'title' => 'Project',
                'sub_menu' => [
                    'side-menu' => [
                        'icon' => '',
                        'route_name' => 'crud-data-list',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'List-Project'
                    ],
                    'simple-menu' => [
                        'icon' => '',
                        'route_name' => 'dashboard-overview-1',
                        'params' => [
                            'layout' => 'simple-menu'
                        ],
                        'title' => 'Create-Project'
                    ],
                ]
            ],
            'users' => [
                'icon' => 'users',
                'title' => 'Users',
                'sub_menu' => [
                    'users-layout-1' => [
                        'icon' => '',
                        'route_name' => 'users-layout-1',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Team Leader'
                    ],
                    'users-layout-2' => [
                        'icon' => '',
                        'route_name' => 'users-layout-2',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Tenaga Ahli'
                    ],
                ]
            ],
        ];
    }
}
