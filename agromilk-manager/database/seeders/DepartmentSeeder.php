<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $structure = [
            'Matriz Belo Horizonte' => [
                'Financeiro',
                'Controladoria',
                'Recursos Humanos',
                'Compras e Suprimentos',
                'TI Central / BI',
                'Comercial e Marketing',
            ],
            'Unidade Produtiva Uberlândia' => [
                'Produção Animal',
                'Saúde Animal',
                'Manutenção e Automação',
                'Logística',
            ],
            'Unidade Produtiva Patos de Minas' => [
                'Produção Animal',
                'Saúde Animal',
                'Manutenção e Automação',
                'Logística',
            ],
        ];

        foreach ($structure as $unitName => $departments) {
            $unit = Unit::where('name', $unitName)->first();

            if (! $unit) {
                continue;
            }

            foreach ($departments as $departmentName) {
                Department::updateOrCreate(
                    [
                        'unit_id' => $unit->id,
                        'slug' => Str::slug($departmentName),
                    ],
                    [
                        'unit_id' => $unit->id,
                        'name' => $departmentName,
                        'slug' => Str::slug($departmentName),
                        'description' => "Departamento de {$departmentName} da unidade {$unit->name}.",
                        'is_active' => true,
                    ]
                );
            }
        }
    }
}
