<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SysMenu;

class SysMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        // Dashboard
        SysMenu::create([
            'menu_id' => 'A001',
            'menu_kode' => 'home',
            'menu_judul' => 'Home',
            'menu_order' => '00',
            'menu_parent' => '#',
            'menu_aktif' => 1,
            'menu_icon' => 'las la-user fs-2x',
            'menu_level' => '1',
            'menu_sub' => 1,
            'created_at' => now()
        ]);

        SysMenu::create([
            'menu_id' => 'A0011',
            'menu_kode' => 'dashboard',
            'menu_judul' => 'Dashboard',
            'menu_order' => '00.01',
            'menu_parent' => 'A001',
            'menu_aktif' => 1,
            'menu_icon' => 'las la-user fs-2x',
            'menu_level' => '2',
            'menu_sub' => 0,
            'created_at' => now()
        ]);

        // Pengaturan
        SysMenu::create([
            'menu_id' => 'A002',
            'menu_kode' => 'pengaturan',
            'menu_judul' => 'Pengaturan',
            'menu_order' => '01',
            'menu_parent' => '#',
            'menu_aktif' => 1,
            'menu_icon' => 'las la-user fs-2x',
            'menu_level' => '1',
            'menu_sub' => 1,
            'created_at' => now()
        ]);

        SysMenu::create([
            'menu_id' => 'A0021',
            'menu_kode' => 'hakakses',
            'menu_judul' => 'Hak Akses',
            'menu_order' => '01.01',
            'menu_parent' => 'A002',
            'menu_aktif' => 1,
            'menu_icon' => 'las la-user fs-2x',
            'menu_level' => '2',
            'menu_sub' => 0,
            'created_at' => now()
        ]);

        SysMenu::create([
            'menu_id' => 'A0022',
            'menu_kode' => 'user',
            'menu_judul' => 'Master User',
            'menu_order' => '01.02',
            'menu_parent' => 'A002',
            'menu_aktif' => 1,
            'menu_icon' => 'las la-user fs-2x',
            'menu_level' => '2',
            'menu_sub' => 0,
            'created_at' => now()
        ]);

        // Finance
        SysMenu::create([
            'menu_id' => 'A003',
            'menu_kode' => 'finance',
            'menu_judul' => 'Finance',
            'menu_order' => '02',
            'menu_parent' => '#',
            'menu_aktif' => 1,
            'menu_icon' => 'las la-user fs-2x',
            'menu_level' => '1',
            'menu_sub' => 1,
            'created_at' => now()
        ]);

        SysMenu::create([
            'menu_id' => 'A0031',
            'menu_kode' => 'exchange',
            'menu_judul' => 'Exchange Rate',
            'menu_order' => '02.01',
            'menu_parent' => 'A003',
            'menu_aktif' => 1,
            'menu_icon' => 'las la-user fs-2x',
            'menu_level' => '2',
            'menu_sub' => 0,
            'created_at' => now()
        ]);

        SysMenu::create([
            'menu_id' => 'A00311',
            'menu_kode' => 'readexchange',
            'menu_judul' => 'Read Exchange Rate',
            'menu_order' => '02.01.01',
            'menu_parent' => 'A0031',
            'menu_aktif' => 1,
            'menu_icon' => 'las la-user fs-2x',
            'menu_level' => '3',
            'menu_sub' => 0,
            'created_at' => now()
        ]);

        SysMenu::create([
            'menu_id' => 'A00312',
            'menu_kode' => 'updateexchange',
            'menu_judul' => 'Update Exchange Rate',
            'menu_order' => '02.01.02',
            'menu_parent' => 'A0031',
            'menu_aktif' => 1,
            'menu_icon' => 'las la-user fs-2x',
            'menu_level' => '3',
            'menu_sub' => 0,
            'created_at' => now()
        ]);
    }
}
