<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class AdminTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // base tables
        \Encore\Admin\Auth\Database\Menu::truncate();
        \Encore\Admin\Auth\Database\Menu::insert(
            [
                [
                    "icon" => "fa-bar-chart",
                    "order" => 1,
                    "parent_id" => 0,
                    "permission" => NULL,
                    "title" => "首页",
                    "uri" => "/"
                ],
                [
                    "icon" => "fa-tasks",
                    "order" => 2,
                    "parent_id" => 0,
                    "permission" => NULL,
                    "title" => "系统管理",
                    "uri" => NULL
                ],
                [
                    "icon" => "fa-users",
                    "order" => 3,
                    "parent_id" => 2,
                    "permission" => NULL,
                    "title" => "管理员",
                    "uri" => "auth/users"
                ],
                [
                    "icon" => "fa-user",
                    "order" => 4,
                    "parent_id" => 2,
                    "permission" => NULL,
                    "title" => "角色",
                    "uri" => "auth/roles"
                ],
                [
                    "icon" => "fa-ban",
                    "order" => 5,
                    "parent_id" => 2,
                    "permission" => NULL,
                    "title" => "权限",
                    "uri" => "auth/permissions"
                ],
                [
                    "icon" => "fa-bars",
                    "order" => 6,
                    "parent_id" => 2,
                    "permission" => NULL,
                    "title" => "菜单",
                    "uri" => "auth/menu"
                ],
                [
                    "icon" => "fa-history",
                    "order" => 7,
                    "parent_id" => 2,
                    "permission" => NULL,
                    "title" => "操作日志",
                    "uri" => "auth/logs"
                ]
            ]
        );

        \Encore\Admin\Auth\Database\Permission::truncate();
        \Encore\Admin\Auth\Database\Permission::insert(
            [
                [
                    "http_method" => "",
                    "http_path" => "*",
                    "name" => "所有权限",
                    "slug" => "*"
                ],
                [
                    "http_method" => "GET",
                    "http_path" => "/",
                    "name" => "首页",
                    "slug" => "dashboard"
                ],
                [
                    "http_method" => "",
                    "http_path" => "/auth/login\r\n/auth/logout",
                    "name" => "登录",
                    "slug" => "auth.login"
                ],
                [
                    "http_method" => "GET,PUT",
                    "http_path" => "/auth/setting",
                    "name" => "用户设置",
                    "slug" => "auth.setting"
                ],
                [
                    "http_method" => "",
                    "http_path" => "/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs",
                    "name" => "系统管理",
                    "slug" => "auth.management"
                ]
            ]
        );

        \Encore\Admin\Auth\Database\Role::truncate();
        \Encore\Admin\Auth\Database\Role::insert(
            [
                [
                    "name" => "超级管理员",
                    "slug" => "administrator"
                ]
            ]
        );

        // pivot tables
        DB::table('admin_role_menu')->truncate();
        DB::table('admin_role_menu')->insert(
            [
                [
                    "menu_id" => 2,
                    "role_id" => 1
                ]
            ]
        );

        DB::table('admin_role_permissions')->truncate();
        DB::table('admin_role_permissions')->insert(
            [
                [
                    "permission_id" => 1,
                    "role_id" => 1
                ]
            ]
        );

        // finish
    }
}
