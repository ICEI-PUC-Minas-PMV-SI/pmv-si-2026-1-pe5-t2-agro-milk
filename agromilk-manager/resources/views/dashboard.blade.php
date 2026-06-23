<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                Visão geral da infraestrutura e operação digital da AgroMilk.
            </p>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">

            <!-- Boas-vindas -->
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex flex-col justify-between gap-4 md:flex-row md:items-center">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">
                                Bem-vindo, {{ auth()->user()->name }}!
                            </h3>

                            <p class="mt-1 text-sm text-gray-600">
                                Use o painel para acompanhar unidades, departamentos e ativos cadastrados no sistema.
                            </p>
                        </div>

                        <div class="flex gap-3">
                            <a
                                href="{{ route('units.index') }}"
                                class="rounded-md border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50"
                            >
                                Ver unidades
                            </a>

                            <a
                                href="{{ route('equipment.create') }}"
                                class="rounded-md bg-gray-900 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700"
                            >
                                Novo equipamento
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cards principais -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                    <p class="text-sm font-medium text-gray-500">Usuários</p>
                    <p class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['users'] }}</p>
                    <p class="mt-1 text-xs text-gray-500">Usuários com acesso ao sistema</p>
                </div>

                <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                    <p class="text-sm font-medium text-gray-500">Unidades</p>
                    <p class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['units'] }}</p>
                    <p class="mt-1 text-xs text-gray-500">Matriz e filiais cadastradas</p>
                </div>

                <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                    <p class="text-sm font-medium text-gray-500">Departamentos</p>
                    <p class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['departments'] }}</p>
                    <p class="mt-1 text-xs text-gray-500">Setores operacionais e administrativos</p>
                </div>

                <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                    <p class="text-sm font-medium text-gray-500">Equipamentos</p>
                    <p class="mt-2 text-3xl font-bold text-gray-900">{{ $stats['equipment'] }}</p>
                    <p class="mt-1 text-xs text-gray-500">Ativos de rede e infraestrutura</p>
                </div>
            </div>

            <!-- Status dos equipamentos -->
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Equipamentos ativos</p>
                            <p class="mt-2 text-3xl font-bold text-green-700">
                                {{ $stats['equipment_active'] }}
                            </p>
                        </div>

                        <div class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                            Ativo
                        </div>
                    </div>
                </div>

                <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Em manutenção</p>
                            <p class="mt-2 text-3xl font-bold text-yellow-700">
                                {{ $stats['equipment_maintenance'] }}
                            </p>
                        </div>

                        <div class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">
                            Atenção
                        </div>
                    </div>
                </div>

                <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Inativos</p>
                            <p class="mt-2 text-3xl font-bold text-red-700">
                                {{ $stats['equipment_inactive'] }}
                            </p>
                        </div>

                        <div class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                            Inativo
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

                <!-- Unidades -->
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg lg:col-span-1">
                    <div class="border-b border-gray-100 p-6">
                        <h3 class="text-lg font-semibold text-gray-900">
                            Unidades
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Resumo por localidade.
                        </p>
                    </div>

                    <div class="divide-y divide-gray-100">
                        @forelse ($units as $unit)
                            <div class="p-6">
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <p class="font-semibold text-gray-900">
                                            {{ $unit->name }}
                                        </p>

                                        <p class="mt-1 text-sm text-gray-500">
                                            {{ $unit->city }}/{{ $unit->state }}
                                        </p>
                                    </div>

                                    <span class="rounded-full bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-700">
                                        {{ ucfirst($unit->type) }}
                                    </span>
                                </div>

                                <div class="mt-4 grid grid-cols-2 gap-3 text-sm">
                                    <div class="rounded-md bg-gray-50 p-3">
                                        <p class="font-semibold text-gray-900">
                                            {{ $unit->departments_count }}
                                        </p>
                                        <p class="text-xs text-gray-500">
                                            Departamentos
                                        </p>
                                    </div>

                                    <div class="rounded-md bg-gray-50 p-3">
                                        <p class="font-semibold text-gray-900">
                                            {{ $unit->equipment_count }}
                                        </p>
                                        <p class="text-xs text-gray-500">
                                            Equipamentos
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="p-6 text-sm text-gray-500">
                                Nenhuma unidade cadastrada.
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Últimos equipamentos -->
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg lg:col-span-2">
                    <div class="flex items-center justify-between border-b border-gray-100 p-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">
                                Últimos equipamentos cadastrados
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">
                                Ativos adicionados recentemente ao sistema.
                            </p>
                        </div>

                        <a href="{{ route('equipment.index') }}" class="text-sm font-semibold text-gray-700 hover:text-gray-900">
                            Ver todos
                        </a>
                    </div>

                    <div class="overflow-x-auto p-6">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Nome</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Tipo</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Unidade</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Status</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                @forelse ($latestEquipment as $item)
                                    <tr>
                                        <td class="px-4 py-3 text-sm font-medium text-gray-900">
                                            <a href="{{ route('equipment.show', $item) }}" class="hover:underline">
                                                {{ $item->name }}
                                            </a>
                                        </td>

                                        <td class="px-4 py-3 text-sm text-gray-700">
                                            {{ $item->type }}
                                        </td>

                                        <td class="px-4 py-3 text-sm text-gray-700">
                                            {{ $item->unit->name ?? '-' }}
                                        </td>

                                        <td class="px-4 py-3 text-sm">
                                            @if ($item->status === 'ativo')
                                                <span class="rounded-full bg-green-100 px-2 py-1 text-xs font-semibold text-green-700">
                                                    Ativo
                                                </span>
                                            @elseif ($item->status === 'manutencao')
                                                <span class="rounded-full bg-yellow-100 px-2 py-1 text-xs font-semibold text-yellow-700">
                                                    Manutenção
                                                </span>
                                            @else
                                                <span class="rounded-full bg-red-100 px-2 py-1 text-xs font-semibold text-red-700">
                                                    Inativo
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-6 text-center text-sm text-gray-500">
                                            Nenhum equipamento cadastrado.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
