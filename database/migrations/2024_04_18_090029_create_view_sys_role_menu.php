<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
        create or replace algorithm = UNDEFINED view `view_sys_role_menu` as
        select
            `crm`.`role_menu_id` as `role_menu_id`,
            `crm`.`role_menu_menu_id` as `role_menu_menu_id`,
            `crm`.`role_menu_role_id` as `role_menu_role_id`,
            `cm`.`menu_id` as `menu_id`,
            `cm`.`menu_kode` as `menu_kode`,
            `cm`.`menu_judul` as `menu_judul`,
            `cm`.`menu_order` as `menu_order`,
            `cm`.`menu_parent` as `menu_parent`,
            `cm`.`menu_aktif` as `menu_aktif`,
            `cm`.`menu_icon` as `menu_icon`,
            `cm`.`menu_level` as `menu_level`,
            `cm`.`menu_sub` as `menu_sub`,
            `cm`.`created_at` as `created_at`,
            `cm`.`updated_at` as `updated_at`,
            `cr`.`role_id` as `role_id`,
            `cr`.`role_name` as `role_name`
        from
            ((`sys_role_menu` `crm`
        left join `sys_menu` `cm` on
            ((`crm`.`role_menu_menu_id` = `cm`.`menu_id`)))
        left join `sys_role` `cr` on
            ((`crm`.`role_menu_role_id` = `cr`.`role_id`)));
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS view_sys_role_menu');
    }
};
