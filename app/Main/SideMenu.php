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
            'Jurnal' => [
                        'icon' => 'box',
                        'title' => 'Project',
                                'route_name' => 'indexAntrian',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Antrian Surat'
                            ],
            'Regis' => [
                                'icon' => 'user',
                                'title' => 'Regis',
                                        'route_name' => 'register.index',
                                        'params' => [
                                            'layout' => 'side-menu'
                                        ],
                                        'title' => 'Registrasi User'
                                    ],
        ];
    }
}
