<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SysRoleMenu;

class SysRoleMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        SysRoleMenu::create([
            'role_menu_id' => md5(rand(0, 100).date('Y-m-d H:i:s').generateCode()),
            'role_menu_menu_id' => 'A001',
            'role_menu_role_id' => 'ADM001',
            'created_at' => now()
        ]);

        SysRoleMenu::create([
            'role_menu_id' => md5(rand(0, 100).date('Y-m-d H:i:s').generateCode()),
            'role_menu_menu_id' => 'A0011',
            'role_menu_role_id' => 'ADM001',
            'created_at' => now()
        ]);

        SysRoleMenu::create([
            'role_menu_id' => md5(rand(0, 100).date('Y-m-d H:i:s').generateCode()),
            'role_menu_menu_id' => 'A002',
            'role_menu_role_id' => 'ADM001',
            'created_at' => now()
        ]);

        SysRoleMenu::create([
            'role_menu_id' => md5(rand(0, 100).date('Y-m-d H:i:s').generateCode()),
            'role_menu_menu_id' => 'A0021',
            'role_menu_role_id' => 'ADM001',
            'created_at' => now()
        ]);

        SysRoleMenu::create([
            'role_menu_id' => md5(rand(0, 100).date('Y-m-d H:i:s').generateCode()),
            'role_menu_menu_id' => 'A0022',
            'role_menu_role_id' => 'ADM001',
            'created_at' => now()
        ]);

        SysRoleMenu::create([
            'role_menu_id' => md5(rand(0, 100).date('Y-m-d H:i:s').generateCode()),
            'role_menu_menu_id' => 'A003',
            'role_menu_role_id' => 'ADM001',
            'created_at' => now()
        ]);

        SysRoleMenu::create([
            'role_menu_id' => md5(rand(0, 100).date('Y-m-d H:i:s').generateCode()),
            'role_menu_menu_id' => 'A0031',
            'role_menu_role_id' => 'ADM001',
            'created_at' => now()
        ]);

        SysRoleMenu::create([
            'role_menu_id' => md5(rand(0, 100).date('Y-m-d H:i:s').generateCode()),
            'role_menu_menu_id' => 'A00311',
            'role_menu_role_id' => 'ADM001',
            'created_at' => now()
        ]);

        SysRoleMenu::create([
            'role_menu_id' => md5(rand(0, 100).date('Y-m-d H:i:s').generateCode()),
            'role_menu_menu_id' => 'A00312',
            'role_menu_role_id' => 'ADM001',
            'created_at' => now()
        ]);

        // User
        SysRoleMenu::create([
            'role_menu_id' => md5(rand(0, 100).date('Y-m-d H:i:s').generateCode()),
            'role_menu_menu_id' => 'A001',
            'role_menu_role_id' => 'USR001',
            'created_at' => now()
        ]);

        SysRoleMenu::create([
            'role_menu_id' => md5(rand(0, 100).date('Y-m-d H:i:s').generateCode()),
            'role_menu_menu_id' => 'A0011',
            'role_menu_role_id' => 'USR001',
            'created_at' => now()
        ]);

        SysRoleMenu::create([
            'role_menu_id' => md5(rand(0, 100).date('Y-m-d H:i:s').generateCode()),
            'role_menu_menu_id' => 'A003',
            'role_menu_role_id' => 'USR001',
            'created_at' => now()
        ]);

        SysRoleMenu::create([
            'role_menu_id' => md5(rand(0, 100).date('Y-m-d H:i:s').generateCode()),
            'role_menu_menu_id' => 'A0031',
            'role_menu_role_id' => 'USR001',
            'created_at' => now()
        ]);

        SysRoleMenu::create([
            'role_menu_id' => md5(rand(0, 100).date('Y-m-d H:i:s').generateCode()),
            'role_menu_menu_id' => 'A00311',
            'role_menu_role_id' => 'USR001',
            'created_at' => now()
        ]);
    }
}
