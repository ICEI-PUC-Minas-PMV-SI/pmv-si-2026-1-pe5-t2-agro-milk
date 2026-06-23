@csrf

<div class="grid grid-cols-1 gap-6 md:grid-cols-2">
    <div>
        <x-input-label for="name" value="Nome do equipamento" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
            value="{{ old('name', $equipment->name ?? '') }}" required />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="type" value="Tipo" />
        <select id="type" name="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            <option value="">Selecione</option>
            @foreach ($types as $type)
                <option value="{{ $type }}" @selected(old('type', $equipment->type ?? '') === $type)>
                    {{ $type }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('type')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="unit_id" value="Unidade" />
        <select id="unit_id" name="unit_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            <option value="">Selecione</option>
            @foreach ($units as $unit)
                <option value="{{ $unit->id }}" @selected((int) old('unit_id', $equipment->unit_id ?? '') === $unit->id)>
                    {{ $unit->name }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('unit_id')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="department_id" value="Departamento" />
        <select id="department_id" name="department_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="">Nenhum</option>
            @foreach ($departments as $department)
                <option value="{{ $department->id }}" @selected((int) old('department_id', $equipment->department_id ?? '') === $department->id)>
                    {{ $department->name }} — {{ $department->unit->name ?? '' }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="ip_address" value="Endereço IP" />
        <x-text-input id="ip_address" name="ip_address" type="text" class="mt-1 block w-full"
            value="{{ old('ip_address', $equipment->ip_address ?? '') }}" placeholder="192.168.0.10" />
        <x-input-error :messages="$errors->get('ip_address')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="mac_address" value="MAC Address" />
        <x-text-input id="mac_address" name="mac_address" type="text" class="mt-1 block w-full"
            value="{{ old('mac_address', $equipment->mac_address ?? '') }}" placeholder="AA:BB:CC:DD:EE:FF" />
        <x-input-error :messages="$errors->get('mac_address')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="asset_tag" value="Patrimônio" />
        <x-text-input id="asset_tag" name="asset_tag" type="text" class="mt-1 block w-full"
            value="{{ old('asset_tag', $equipment->asset_tag ?? '') }}" />
        <x-input-error :messages="$errors->get('asset_tag')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="status" value="Status" />
        <select id="status" name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            @foreach ($statuses as $value => $label)
                <option value="{{ $value }}" @selected(old('status', $equipment->status ?? 'ativo') === $value)>
                    {{ $label }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('status')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="installation_date" value="Data de instalação" />
        <x-text-input id="installation_date" name="installation_date" type="date" class="mt-1 block w-full"
            value="{{ old('installation_date', isset($equipment) && $equipment->installation_date ? $equipment->installation_date->format('Y-m-d') : '') }}" />
        <x-input-error :messages="$errors->get('installation_date')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="responsible_name" value="Responsável" />
        <x-text-input id="responsible_name" name="responsible_name" type="text" class="mt-1 block w-full"
            value="{{ old('responsible_name', $equipment->responsible_name ?? '') }}" />
        <x-input-error :messages="$errors->get('responsible_name')" class="mt-2" />
    </div>

    <div class="md:col-span-2">
        <x-input-label for="notes" value="Observações" />
        <textarea id="notes" name="notes" rows="4"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('notes', $equipment->notes ?? '') }}</textarea>
        <x-input-error :messages="$errors->get('notes')" class="mt-2" />
    </div>
</div>

<div class="mt-6 flex items-center gap-3">
    <x-primary-button>Salvar</x-primary-button>

    <a href="{{ route('equipment.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
        Cancelar
    </a>
</div>
