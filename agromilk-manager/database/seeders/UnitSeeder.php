<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    public function run(): void
    {
        $units = [
            [
                'name' => 'Matriz Belo Horizonte',
                'type' => 'matriz',
                'city' => 'Belo Horizonte',
                'state' => 'MG',
                'responsible_name' => 'Gestão Corporativa',
                'is_active' => true,
                'notes' => 'Sede administrativa responsável por governança, BI, financeiro, RH, compras, TI e comercial.',
            ],
            [
                'name' => 'Unidade Produtiva Uberlândia',
                'type' => 'filial',
                'city' => 'Uberlândia',
                'state' => 'MG',
                'responsible_name' => 'Gestão da Produção Animal',
                'is_active' => true,
                'notes' => 'Filial focada em produção leiteira automatizada e melhoramento genético do rebanho.',
            ],
            [
                'name' => 'Unidade Produtiva Patos de Minas',
                'type' => 'filial',
                'city' => 'Patos de Minas',
                'state' => 'MG',
                'responsible_name' => 'Gestão Logística Regional',
                'is_active' => true,
                'notes' => 'Filial dedicada à produção em larga escala e logística regional de distribuição.',
            ],
        ];

        foreach ($units as $unit) {
            Unit::updateOrCreate(
                [
                    'name' => $unit['name'],
                    'city' => $unit['city'],
                ],
                $unit
            );
        }
    }
}
