<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat Role
        Role::updateOrCreate([
            'name'=>'superadmin'
        ],
        ['name' => 'superadmin']
    );

        Role::updateOrCreate([
            'name'=>'pimpinan'
        ],
        ['name' => 'pimpinan']
    );

        Role::updateOrCreate([
            'name'=>'operator'
        ],
        ['name' => 'operator']
    );


        // Membuat permission
        ModelsPermission::updateOrCreate([
            'name'=>'store_role'
        ],
        ['name' => 'store_role']
    );
    
    ModelsPermission::updateOrCreate([
        'name'=>'delete_role'
    ],
    ['name' => 'delete_role']
);
    ModelsPermission::updateOrCreate([
        'name'=>'edit_role'
    ],
    ['name' => 'edit_role']
);
    ModelsPermission::updateOrCreate([
        'name'=>'update_role'
        ],
        ['name' => 'update_role']
);
    
    
    ModelsPermission::updateOrCreate([
            'name'=>'store_user'
        ],
        ['name' => 'store_user']
    );
    ModelsPermission::updateOrCreate([
            'name'=>'show_user'
        ],
        ['name' => 'show_user']
    );
    ModelsPermission::updateOrCreate([
            'name'=>'edit_user'
        ],
        ['name' => 'edit_user']
    );
        ModelsPermission::updateOrCreate([
            'name'=>'update_user'
        ],
        ['name' => 'update_user']
    );
        ModelsPermission::updateOrCreate([
            'name'=>'delete_user'
        ],
        ['name' => 'delete_user']
    );
    

        ModelsPermission::updateOrCreate([
            'name'=>'approver_data'
        ],
        ['name' => 'approver_data']
    );

    ModelsPermission::updateOrCreate([
            'name'=>'update_data'
        ],
        ['name' => 'update_data']
    );
    ModelsPermission::updateOrCreate([
            'name'=>'delete_data'
        ],
        ['name' => 'delete_data']
    );


        // membuat role_has_permission
        $role_superadmin = Role::findByName('superadmin');
        $role_superadmin -> givePermissionTo('store_role');
        $role_superadmin -> givePermissionTo('delete_role');
        $role_superadmin -> givePermissionTo('edit_role');
        $role_superadmin -> givePermissionTo('update_role');

        $role_superadmin -> givePermissionTo('store_user');
        $role_superadmin -> givePermissionTo('show_user');
        $role_superadmin -> givePermissionTo('edit_user');
        $role_superadmin -> givePermissionTo('update_user');
        $role_superadmin -> givePermissionTo('delete_user');
        
        $role_pimpinan = Role::findByName('pimpinan');
        $role_pimpinan -> givePermissionTo('approver_data');
        $role_pimpinan -> givePermissionTo('update_data');
        $role_pimpinan -> givePermissionTo('delete_data');


    }
}
