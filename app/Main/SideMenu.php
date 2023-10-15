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
                        'route_name' => 'adminDashboard',
                        'params' => [
                            'layout' => 'side-menu',
                        ],
                        'title' => 'Dashboard'
                    ],
            'Project' => [
                'icon' => 'box',
                'title' => 'Project',
                        'route_name' => 'projectIndex',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Project'
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
