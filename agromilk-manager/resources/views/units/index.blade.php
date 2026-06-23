<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Unidades
            </h2>

            <a
                href="{{ route('units.create') }}"
                class="rounded-md bg-gray-900 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700"
            >
                Nova unidade
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 rounded-md bg-green-50 p-4 text-sm text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto p-6">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Nome</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Tipo</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Cidade/UF</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase text-gray-500">Status</th>
                                <th class="px-4 py-3 text-right text-xs font-medium uppercase text-gray-500">Ações</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            @forelse ($units as $unit)
                                <tr>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-900">
                                        {{ $unit->name }}
                                    </td>

                                    <td class="px-4 py-3 text-sm text-gray-700">
                                        {{ ucfirst($unit->type) }}
                                    </td>

                                    <td class="px-4 py-3 text-sm text-gray-700">
                                        {{ $unit->city }}/{{ $unit->state }}
                                    </td>

                                    <td class="px-4 py-3 text-sm">
                                        @if ($unit->is_active)
                                            <span class="rounded-full bg-green-100 px-2 py-1 text-xs font-semibold text-green-700">
                                                Ativa
                                            </span>
                                        @else
                                            <span class="rounded-full bg-red-100 px-2 py-1 text-xs font-semibold text-red-700">
                                                Inativa
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3 text-right text-sm">
                                        <div class="flex justify-end gap-3">
                                            <a href="{{ route('units.show', $unit) }}" class="text-gray-600 hover:text-gray-900">
                                                Ver
                                            </a>

                                            <a href="{{ route('units.edit', $unit) }}" class="text-indigo-600 hover:text-indigo-900">
                                                Editar
                                            </a>

                                            <form
                                                action="{{ route('units.destroy', $unit) }}"
                                                method="POST"
                                                onsubmit="return confirm('Deseja realmente remover esta unidade?')"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    Remover
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-6 text-center text-sm text-gray-500">
                                        Nenhuma unidade cadastrada.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-6">
                        {{ $units->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
