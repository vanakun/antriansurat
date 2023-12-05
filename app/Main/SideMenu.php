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
                                'route_name' => 'indexjurnal',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Jurnal'
                            ],
            'Jurnal umum' => [
                'icon' => 'box',
                'title' => 'Project',
                        'route_name' => 'index',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Jurnal umum'
                    ],
            'Buku Besar' => [
                        'icon' => 'book',
                        'title' => 'Buku besar',
                                'route_name' => 'indexBukuBesar',
                                'params' => [
                                    'layout' => 'side-menu'
                                ],
                                'title' => 'Buku Besar'
                    ],
            // 'Neraca' => [
            //     'icon' => 'box',
            //     'title' => 'Project',
            //             'route_name' => 'index',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Neraca'
            // ],
            'Neraca Lajur' => [
                'icon' => 'box',
                'title' => 'Project',
                        'route_name' => 'indexNeracaLajur',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Neraca Lajur'
            ],
            // 'Laba Rugi' => [
            //     'icon' => 'box',
            //     'title' => 'Project',
            //             'route_name' => 'index',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Laba Rugi'
            // ],
        ];
    }
}
