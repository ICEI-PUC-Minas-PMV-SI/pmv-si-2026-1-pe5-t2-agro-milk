<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Administrador',
                'slug' => 'administrador',
                'description' => 'Acesso total ao sistema.',
            ],
            [
                'name' => 'TI',
                'slug' => 'ti',
                'description' => 'Responsável por usuários, equipamentos, segurança e manutenção.',
            ],
            [
                'name' => 'Gestor da Matriz',
                'slug' => 'gestor-matriz',
                'description' => 'Responsável pela gestão da sede administrativa.',
            ],
            [
                'name' => 'Gestor da Filial',
                'slug' => 'gestor-filial',
                'description' => 'Responsável pela gestão de uma unidade produtiva.',
            ],
            [
                'name' => 'Operador de Campo',
                'slug' => 'operador-campo',
                'description' => 'Usuário operacional das fazendas e currais.',
            ],
            [
                'name' => 'Consulta',
                'slug' => 'consulta',
                'description' => 'Usuário com acesso somente para consulta.',
            ],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['slug' => $role['slug']],
                $role
            );
        }
    }
}
