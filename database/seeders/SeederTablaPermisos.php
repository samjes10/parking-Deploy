<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//agregamos el modelo de permisos de spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permisos = [
            //Operacions sobre tabla usuarios
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',

            //Operaciones sobre tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //Operaciones sobre tabla Parqueo
            'ver-parqueo',
            'crear-parqueo',
            'editar-parqueo',
            'borrar-parqueo',
            //Operaciones sobre tabla asignacion
            'ver-asignacion',
            'crear-asignacion',
            'editar-asignacion',
            'borrar-asignacion',
            //Operaciones sobre tabla pagos
            'ver-pagos',
            'crear-pagos',
            'editar-pagos',
            'borrar-pagos',

            
        ];

        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}

