<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Equipment;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    public function run(): void
    {
        $matriz = Unit::where('name', 'Matriz Belo Horizonte')->first();
        $uberlandia = Unit::where('name', 'Unidade Produtiva Uberlândia')->first();
        $patos = Unit::where('name', 'Unidade Produtiva Patos de Minas')->first();

        if (! $matriz || ! $uberlandia || ! $patos) {
            return;
        }

        $tiMatriz = Department::where('unit_id', $matriz->id)
            ->where('name', 'TI Central / BI')
            ->first();

        $financeiro = Department::where('unit_id', $matriz->id)
            ->where('name', 'Financeiro')
            ->first();

        $producaoUberlandia = Department::where('unit_id', $uberlandia->id)
            ->where('name', 'Produção Animal')
            ->first();

        $saudeUberlandia = Department::where('unit_id', $uberlandia->id)
            ->where('name', 'Saúde Animal')
            ->first();

        $manutencaoUberlandia = Department::where('unit_id', $uberlandia->id)
            ->where('name', 'Manutenção e Automação')
            ->first();

        $logisticaPatos = Department::where('unit_id', $patos->id)
            ->where('name', 'Logística')
            ->first();

        $producaoPatos = Department::where('unit_id', $patos->id)
            ->where('name', 'Produção Animal')
            ->first();

        $manutencaoPatos = Department::where('unit_id', $patos->id)
            ->where('name', 'Manutenção e Automação')
            ->first();

        $equipment = [
            [
                'unit_id' => $matriz->id,
                'department_id' => $tiMatriz?->id,
                'name' => 'Servidor BI Matriz',
                'type' => 'Servidor',
                'ip_address' => '192.168.10.10',
                'mac_address' => '00:1A:2B:3C:4D:10',
                'asset_tag' => 'AGM-SRV-001',
                'status' => 'ativo',
                'installation_date' => '2026-02-10',
                'responsible_name' => 'Analista de TI AgroMilk',
                'notes' => 'Servidor corporativo utilizado para BI e sistemas internos da matriz.',
            ],
            [
                'unit_id' => $matriz->id,
                'department_id' => $tiMatriz?->id,
                'name' => 'Servidor Gestão Corporativa',
                'type' => 'Servidor',
                'ip_address' => '192.168.10.11',
                'mac_address' => '00:1A:2B:3C:4D:11',
                'asset_tag' => 'AGM-SRV-002',
                'status' => 'ativo',
                'installation_date' => '2026-02-10',
                'responsible_name' => 'Analista de TI AgroMilk',
                'notes' => 'Servidor destinado a aplicações administrativas e banco de dados local.',
            ],
            [
                'unit_id' => $matriz->id,
                'department_id' => $financeiro?->id,
                'name' => 'Desktop Financeiro 01',
                'type' => 'Desktop',
                'ip_address' => '192.168.10.31',
                'mac_address' => '00:1A:2B:3C:4D:31',
                'asset_tag' => 'AGM-DESK-001',
                'status' => 'ativo',
                'installation_date' => '2026-02-15',
                'responsible_name' => 'Equipe Financeira',
                'notes' => 'Estação de trabalho do departamento financeiro.',
            ],
            [
                'unit_id' => $matriz->id,
                'department_id' => $tiMatriz?->id,
                'name' => 'Roteador SD-WAN Matriz',
                'type' => 'Roteador SD-WAN',
                'ip_address' => '192.168.10.1',
                'mac_address' => '00:1A:2B:3C:4D:01',
                'asset_tag' => 'AGM-RTR-001',
                'status' => 'ativo',
                'installation_date' => '2026-02-05',
                'responsible_name' => 'TI Central',
                'notes' => 'Roteador responsável pela comunicação segura entre matriz e filiais via VPN.',
            ],
            [
                'unit_id' => $uberlandia->id,
                'department_id' => $producaoUberlandia?->id,
                'name' => 'Gateway LoRaWAN Curral 01',
                'type' => 'Gateway LoRaWAN',
                'ip_address' => '192.168.20.15',
                'mac_address' => '00:1A:2B:3C:4D:20',
                'asset_tag' => 'AGM-LRW-001',
                'status' => 'ativo',
                'installation_date' => '2026-03-01',
                'responsible_name' => 'Equipe de Produção Animal',
                'notes' => 'Gateway para recepção de dados dos sensores dos animais.',
            ],
            [
                'unit_id' => $uberlandia->id,
                'department_id' => $manutencaoUberlandia?->id,
                'name' => 'AP Wi-Fi Outdoor Curral Central',
                'type' => 'Access Point Wi-Fi 6 Outdoor',
                'ip_address' => '192.168.20.21',
                'mac_address' => '00:1A:2B:3C:4D:21',
                'asset_tag' => 'AGM-AP-001',
                'status' => 'ativo',
                'installation_date' => '2026-03-02',
                'responsible_name' => 'Manutenção e Automação',
                'notes' => 'Access Point para cobertura de rede no curral central.',
            ],
            [
                'unit_id' => $uberlandia->id,
                'department_id' => $saudeUberlandia?->id,
                'name' => 'Tablet Veterinário Uberlândia 01',
                'type' => 'Tablet Ruggedized',
                'ip_address' => '192.168.20.51',
                'mac_address' => '00:1A:2B:3C:4D:51',
                'asset_tag' => 'AGM-TAB-001',
                'status' => 'ativo',
                'installation_date' => '2026-03-05',
                'responsible_name' => 'Equipe de Saúde Animal',
                'notes' => 'Tablet de campo utilizado por veterinários para consulta de dados dos animais.',
            ],
            [
                'unit_id' => $uberlandia->id,
                'department_id' => $manutencaoUberlandia?->id,
                'name' => 'Robô de Ordenha Uberlândia 01',
                'type' => 'Robô de Ordenha',
                'ip_address' => '192.168.20.80',
                'mac_address' => '00:1A:2B:3C:4D:80',
                'asset_tag' => 'AGM-ROB-001',
                'status' => 'ativo',
                'installation_date' => '2026-03-08',
                'responsible_name' => 'Manutenção e Automação',
                'notes' => 'Equipamento automatizado utilizado no processo de ordenha.',
            ],
            [
                'unit_id' => $patos->id,
                'department_id' => $producaoPatos?->id,
                'name' => 'Gateway LoRaWAN Pasto Norte',
                'type' => 'Gateway LoRaWAN',
                'ip_address' => '192.168.30.15',
                'mac_address' => '00:1A:2B:3C:4D:30',
                'asset_tag' => 'AGM-LRW-002',
                'status' => 'ativo',
                'installation_date' => '2026-03-01',
                'responsible_name' => 'Equipe de Produção Animal',
                'notes' => 'Gateway para recepção de dados dos sensores da unidade de Patos de Minas.',
            ],
            [
                'unit_id' => $patos->id,
                'department_id' => $manutencaoPatos?->id,
                'name' => 'AP Wi-Fi Outdoor Pasto Norte',
                'type' => 'Access Point Wi-Fi 6 Outdoor',
                'ip_address' => '192.168.30.20',
                'mac_address' => '00:1A:2B:3C:4D:32',
                'asset_tag' => 'AGM-AP-002',
                'status' => 'manutencao',
                'installation_date' => '2026-03-03',
                'responsible_name' => 'Manutenção e Automação',
                'notes' => 'Access Point em manutenção preventiva após instabilidade de sinal.',
            ],
            [
                'unit_id' => $patos->id,
                'department_id' => $logisticaPatos?->id,
                'name' => 'Câmera IP Docas de Distribuição',
                'type' => 'Câmera IP',
                'ip_address' => '192.168.30.61',
                'mac_address' => '00:1A:2B:3C:4D:61',
                'asset_tag' => 'AGM-CAM-001',
                'status' => 'ativo',
                'installation_date' => '2026-03-06',
                'responsible_name' => 'Equipe de Logística',
                'notes' => 'Câmera utilizada para monitoramento das docas de distribuição.',
            ],
            [
                'unit_id' => $patos->id,
                'department_id' => $manutencaoPatos?->id,
                'name' => 'Switch Core Patos de Minas',
                'type' => 'Switch',
                'ip_address' => '192.168.30.2',
                'mac_address' => '00:1A:2B:3C:4D:02',
                'asset_tag' => 'AGM-SWT-001',
                'status' => 'ativo',
                'installation_date' => '2026-02-20',
                'responsible_name' => 'Manutenção e Automação',
                'notes' => 'Switch principal da unidade produtiva de Patos de Minas.',
            ],
        ];

        foreach ($equipment as $item) {
            Equipment::updateOrCreate(
                ['asset_tag' => $item['asset_tag']],
                $item
            );
        }
    }
}
