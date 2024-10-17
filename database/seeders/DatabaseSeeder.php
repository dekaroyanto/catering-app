<?php

namespace Database\Seeders;

use App\Models\Merchant;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Merchant::updateOrCreate(
        //     ['nama_merchant' => 'Toko Sebelah'],
        //     [

        //         'nama_merchant' => 'Toko Sebelah',
        //         'alamat_merchant' => 'Jl. Sebelah',
        //         'kontak_merchant' => '08123',
        //     ]
        // );

        // Merchant::updateOrCreate(
        //     ['nama_merchant' => 'Yowes Ben'],
        //     [

        //         'nama_merchant' => 'Yowes Ben',
        //         'alamat_merchant' => 'Jl. In aja dulu',
        //         'kontak_merchant' => '08234',
        //     ]
        // );

        // Merchant::updateOrCreate(
        //     ['nama_merchant' => 'Toko Ah Tong'],
        //     [

        //         'nama_merchant' => 'Toko Ah Tong',
        //         'alamat_merchant' => 'Kampung Durian Runtuh',
        //         'kontak_merchant' => '08345',
        //     ]
        // );

        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'seller@seller.com'],
            [
                'name' => 'seller',
                'email' => 'seller@seller.com',
                'password' => bcrypt('seller'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'customer@customer.com'],
            [
                'name' => 'customer',
                'email' => 'customer@customer.com',
                'password' => bcrypt('customer'),
            ]
        );

        $role_admin = Role::updateOrCreate(
            [
                'name' => 'admin',
            ],
            ['name' => 'admin']
        );

        $role_seller = Role::updateOrCreate(
            [
                'name' => 'seller',
            ],
            ['name' => 'seller']
        );

        $role_customer = Role::updateOrCreate(
            [
                'name' => 'customer',
            ],
            ['name' => 'customer']
        );

        $permission = Permission::updateOrCreate(
            [
                'name' => 'view_dashboard',
            ],
            ['name' => 'view_dashboard']
        );

        $permission2 = Permission::updateOrCreate(
            [
                'name' => 'view_chart_on_dashboard',
            ],
            ['name' => 'view_chart_on_dashboard']
        );

        $role_admin->givePermissionTo($permission);
        $role_seller->givePermissionTo($permission);
        $role_admin->givePermissionTo($permission2);
        $role_seller->givePermissionTo($permission2);
        $role_customer->givePermissionTo($permission2);

        $user   = User::find(1);
        $user2  = User::find(2);
        $user3  = User::find(3);


        $user->assignRole(['admin']);
        $user2->assignRole(['seller']);
        $user3->assignRole(['customer']);
    }
}
