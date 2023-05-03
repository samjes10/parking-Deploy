<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = User::create([
            'name' => 'Ana Lopez',
            'email' => 'admin123@gmail.com',
            'carnet' => '8765432',
            'cargo' => 'Docente de Electronica',
            'direccion' => 'Zona Norte / OTB-Ice Norte /calle martinez',
            'password' => bcrypt('1234')
        ]);

        $rol=Role::create(['name'=>'Administrador']);
        $permisos=Permission::pluck('id','id')->all();
        $rol->syncPermissions($permisos);
        $usuario->assignRole([$rol->id]);
    }
}
