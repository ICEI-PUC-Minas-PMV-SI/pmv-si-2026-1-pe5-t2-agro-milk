<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Role;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $matriz = Unit::where('name', 'Matriz Belo Horizonte')->first();
        $uberlandia = Unit::where('name', 'Unidade Produtiva Uberlândia')->first();
        $patos = Unit::where('name', 'Unidade Produtiva Patos de Minas')->first();

        $adminRole = Role::where('slug', 'administrador')->first();
        $tiRole = Role::where('slug', 'ti')->first();
        $gestorFilialRole = Role::where('slug', 'gestor-filial')->first();

        $tiMatriz = Department::where('name', 'TI Central / BI')
            ->where('unit_id', $matriz?->id)
            ->first();

        $producaoUberlandia = Department::where('name', 'Produção Animal')
            ->where('unit_id', $uberlandia?->id)
            ->first();

        $producaoPatos = Department::where('name', 'Produção Animal')
            ->where('unit_id', $patos?->id)
            ->first();

        User::updateOrCreate(
            ['email' => 'admin@agromilk.com'],
            [
                'role_id' => $adminRole?->id,
                'unit_id' => $matriz?->id,
                'department_id' => $tiMatriz?->id,
                'name' => 'Administrador AgroMilk',
                'password' => Hash::make('password'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'ti@agromilk.com'],
            [
                'role_id' => $tiRole?->id,
                'unit_id' => $matriz?->id,
                'department_id' => $tiMatriz?->id,
                'name' => 'Analista de TI AgroMilk',
                'password' => Hash::make('password'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'gestor.uberlandia@agromilk.com'],
            [
                'role_id' => $gestorFilialRole?->id,
                'unit_id' => $uberlandia?->id,
                'department_id' => $producaoUberlandia?->id,
                'name' => 'Gestor Filial Uberlândia',
                'password' => Hash::make('password'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'gestor.patos@agromilk.com'],
            [
                'role_id' => $gestorFilialRole?->id,
                'unit_id' => $patos?->id,
                'department_id' => $producaoPatos?->id,
                'name' => 'Gestor Filial Patos de Minas',
                'password' => Hash::make('password'),
            ]
        );
    }
}
