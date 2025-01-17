<?php
/*
This file is part of SeAT

Copyright (C) 2015 to 2020  Leon Jacobs

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/

return [
    'buyback' => [
        'name' => 'menu-entry-name',
        'label' => 'buyback::menu.main_level',
        'plural' => true,
        'icon' => 'fas fa-certificate',
        'route_segment' => 'buyback',
        'permission' => 'buyback.view',
        'entries' => [
            [
                'name' => 'buyback-home-sub-menu',
                'label' => 'buyback::menu.sub-home-level',
                'icon' => 'fas fa-pen',
                'route' => 'buyback.home',
                'permission' => 'buyback.view'
            ],
            [
                'name' => 'buyback-character-contracts-sub-menu',
                'label' => 'buyback::menu.sub-character-contracts-level',
                'icon' => 'fas fa-book-open',
                'route' => 'buyback.character-contracts',
                'permission' => 'buyback.view'
            ],
            [
                'name' => 'buyback-contract-sub-menu',
                'label' => 'buyback::menu.sub-contract-level',
                'icon' => 'fas fa-th-list',
                'route' => 'buyback.contract',
                'permission' => 'buyback.contract'
            ],
            [
                'name' => 'buyback-admin-sub-menu',
                'label' => 'buyback::menu.sub-admin-level',
                'icon' => 'fas fa-cogs',
                'route' => 'buyback.admin',
                'permission' => 'buyback.admin'
            ]
        ],
    ],
];
