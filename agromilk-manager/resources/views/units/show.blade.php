<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ $unit->name }}
            </h2>

            <a href="{{ route('units.edit', $unit) }}" class="rounded-md bg-gray-900 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700">
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
                        <dd class="mt-1 text-sm text-gray-900">{{ ucfirst($unit->type) }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Cidade/UF</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $unit->city }}/{{ $unit->state }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Responsável</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $unit->responsible_name ?? '-' }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Status</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $unit->is_active ? 'Ativa' : 'Inativa' }}
                        </dd>
                    </div>

                    <div class="md:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">Observações</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $unit->notes ?? '-' }}</dd>
                    </div>
                </dl>
            </div>

            <div class="mt-6 bg-white p-6 shadow-sm sm:rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900">
                    Departamentos vinculados
                </h3>

                <div class="mt-4">
                    @forelse ($unit->departments as $department)
                        <div class="border-b py-3 text-sm text-gray-700">
                            {{ $department->name }}
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">
                            Nenhum departamento vinculado.
                        </p>
                    @endforelse
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('units.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
                    Voltar para unidades
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
