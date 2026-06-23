<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ $equipment->name }}
            </h2>

            <a href="{{ route('equipment.edit', $equipment) }}" class="rounded-md bg-gray-900 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700">
                Editar
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <dl class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Tipo</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $equipment->type }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Status</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ ucfirst(str_replace('manutencao', 'manutenção', $equipment->status)) }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Unidade</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $equipment->unit->name ?? '-' }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Departamento</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $equipment->department->name ?? '-' }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">IP</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $equipment->ip_address ?? '-' }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">MAC Address</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $equipment->mac_address ?? '-' }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Patrimônio</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $equipment->asset_tag ?? '-' }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Data de instalação</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $equipment->installation_date?->format('d/m/Y') ?? '-' }}
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Responsável</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $equipment->responsible_name ?? '-' }}</dd>
                    </div>

                    <div class="md:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">Observações</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $equipment->notes ?? '-' }}</dd>
                    </div>
                </dl>
            </div>

            <div class="mt-6">
                <a href="{{ route('equipment.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
                    Voltar para equipamentos
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
