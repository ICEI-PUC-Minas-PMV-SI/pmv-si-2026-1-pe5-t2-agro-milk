@csrf

<div class="grid grid-cols-1 gap-6 md:grid-cols-2">
    <div>
        <x-input-label for="name" value="Nome da unidade" />
        <x-text-input
            id="name"
            name="name"
            type="text"
            class="mt-1 block w-full"
            value="{{ old('name', $unit->name ?? '') }}"
            required
        />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="type" value="Tipo" />
        <select
            id="type"
            name="type"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            required
        >
            <option value="">Selecione</option>
            <option value="matriz" @selected(old('type', $unit->type ?? '') === 'matriz')>Matriz</option>
            <option value="filial" @selected(old('type', $unit->type ?? '') === 'filial')>Filial</option>
        </select>
        <x-input-error :messages="$errors->get('type')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="city" value="Cidade" />
        <x-text-input
            id="city"
            name="city"
            type="text"
            class="mt-1 block w-full"
            value="{{ old('city', $unit->city ?? '') }}"
            required
        />
        <x-input-error :messages="$errors->get('city')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="state" value="Estado" />
        <x-text-input
            id="state"
            name="state"
            type="text"
            maxlength="2"
            class="mt-1 block w-full uppercase"
            value="{{ old('state', $unit->state ?? '') }}"
            required
        />
        <x-input-error :messages="$errors->get('state')" class="mt-2" />
    </div>

    <div class="md:col-span-2">
        <x-input-label for="responsible_name" value="Responsável" />
        <x-text-input
            id="responsible_name"
            name="responsible_name"
            type="text"
            class="mt-1 block w-full"
            value="{{ old('responsible_name', $unit->responsible_name ?? '') }}"
        />
        <x-input-error :messages="$errors->get('responsible_name')" class="mt-2" />
    </div>

    <div class="md:col-span-2">
        <x-input-label for="notes" value="Observações" />
        <textarea
            id="notes"
            name="notes"
            rows="4"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        >{{ old('notes', $unit->notes ?? '') }}</textarea>
        <x-input-error :messages="$errors->get('notes')" class="mt-2" />
    </div>

    <div class="md:col-span-2">
        <label class="flex items-center">
            <input
                type="checkbox"
                name="is_active"
                value="1"
                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                @checked(old('is_active', $unit->is_active ?? true))
            >
            <span class="ms-2 text-sm text-gray-600">Unidade ativa</span>
        </label>
    </div>
</div>

<div class="mt-6 flex items-center gap-3">
    <x-primary-button>
        Salvar
    </x-primary-button>

    <a href="{{ route('units.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
        Cancelar
    </a>
</div>
