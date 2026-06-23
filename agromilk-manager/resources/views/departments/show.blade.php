<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ $department->name }}
            </h2>

            <a
                href="{{ route('departments.edit', $department) }}"
                class="rounded-md bg-gray-900 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700"
            >
                Editar
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <dl class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Departamento</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $department->name }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Unidade</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $department->unit->name ?? '-' }}
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Status</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $department->is_active ? 'Ativo' : 'Inativo' }}
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Slug</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $department->slug }}</dd>
                    </div>

                    <div class="md:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">Descrição</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $department->description ?? '-' }}
                        </dd>
                    </div>
                </dl>
            </div>

            <div class="mt-6 bg-white p-6 shadow-sm sm:rounded-lg">
                <h3 class="text-lg font-semibold text-gray-900">
                    Usuários vinculados
                </h3>

                <div class="mt-4">
                    @forelse ($department->users as $user)
                        <div class="border-b py-3 text-sm text-gray-700">
                            {{ $user->name }} — {{ $user->email }}
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">
                            Nenhum usuário vinculado a este departamento.
                        </p>
                    @endforelse
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('departments.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
                    Voltar para departamentos
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
