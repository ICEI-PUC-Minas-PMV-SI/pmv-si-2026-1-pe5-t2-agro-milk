@csrf

<div class="grid grid-cols-1 gap-6">
    <div>
        <x-input-label for="unit_id" value="Unidade" />

        <select
            id="unit_id"
            name="unit_id"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            required
        >
            <option value="">Selecione uma unidade</option>

            @foreach ($units as $unit)
                <option
                    value="{{ $unit->id }}"
                    @selected((int) old('unit_id', $department->unit_id ?? '') === $unit->id)
                >
                    {{ $unit->name }} - {{ $unit->city }}/{{ $unit->state }}
                </option>
            @endforeach
        </select>

        <x-input-error :messages="$errors->get('unit_id')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="name" value="Nome do departamento" />

        <x-text-input
            id="name"
            name="name"
            type="text"
            class="mt-1 block w-full"
            value="{{ old('name', $department->name ?? '') }}"
            required
        />

        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="description" value="Descrição" />

        <textarea
            id="description"
            name="description"
            rows="4"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        >{{ old('description', $department->description ?? '') }}</textarea>

        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <div>
        <label class="flex items-center">
            <input
                type="checkbox"
                name="is_active"
                value="1"
                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                @checked(old('is_active', $department->is_active ?? true))
            >

            <span class="ms-2 text-sm text-gray-600">
                Departamento ativo
            </span>
        </label>
    </div>
</div>

<div class="mt-6 flex items-center gap-3">
    <x-primary-button>
        Salvar
    </x-primary-button>

    <a href="{{ route('departments.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
        Cancelar
    </a>
</div>
