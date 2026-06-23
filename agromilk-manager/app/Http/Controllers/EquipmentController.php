<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Equipment;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EquipmentController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        $equipment = Equipment::query()
            ->with(['unit', 'department'])
            ->when(
                ! in_array($user->role?->slug, ['administrador', 'ti']),
                fn ($query) => $query->where('unit_id', $user->unit_id)
            )
            ->latest()
            ->paginate(10);

        return view('equipment.index', compact('equipment'));
    }

    public function create(): View
    {

        $user = auth()->user();

        $units = Unit::query()
            ->where('is_active', true)
            ->when(
                ! $user->canSeeAllUnits(),
                fn ($query) => $query->where('id', $user->unit_id)
            )
            ->orderBy('name')
            ->get();

        $departments = Department::query()
            ->where('is_active', true)
            ->when(
                ! $user->canSeeAllUnits(),
                fn ($query) => $query->where('unit_id', $user->unit_id)
            )
            ->with('unit')
            ->orderBy('name')
            ->get();

        return view('equipment.create', [
            'units' => $units,
            'departments' => $departments,
            'types' => $this->types(),
            'statuses' => $this->statuses(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateData($request);
        $this->authorizeUnitAccess((int) $validated['unit_id']);
        if (! empty($validated['department_id'])) {
            $departmentBelongsToUnit = Department::query()
                ->where('id', $validated['department_id'])
                ->where('unit_id', $validated['unit_id'])
                ->exists();

            if (! $departmentBelongsToUnit) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'department_id' => 'O departamento selecionado não pertence à unidade escolhida.',
                    ]);
            }
        }

        Equipment::create($validated);

        return redirect()
            ->route('equipment.index')
            ->with('success', 'Equipamento cadastrado com sucesso.');
    }

    public function show(Equipment $equipment): View
    {
        $this->authorizeUnitAccess($equipment->unit_id);
        $equipment->load(['unit', 'department']);

        return view('equipment.show', compact('equipment'));
    }

    public function edit(Equipment $equipment): View
    {
        $this->authorizeUnitAccess($equipment->unit_id);
        return view('equipment.edit', [
            'equipment' => $equipment,
            'units' => Unit::query()->where('is_active', true)->orderBy('name')->get(),
            'departments' => Department::query()->where('is_active', true)->with('unit')->orderBy('name')->get(),
            'types' => $this->types(),
            'statuses' => $this->statuses(),
        ]);
    }

    public function update(Request $request, Equipment $equipment): RedirectResponse
    {
        $this->authorizeUnitAccess($equipment->unit_id);
        $validated = $this->validateData($request);
        $this->authorizeUnitAccess((int) $validated['unit_id']);
        if (! empty($validated['department_id'])) {
            $departmentBelongsToUnit = Department::query()
                ->where('id', $validated['department_id'])
                ->where('unit_id', $validated['unit_id'])
                ->exists();

            if (! $departmentBelongsToUnit) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'department_id' => 'O departamento selecionado não pertence à unidade escolhida.',
                    ]);
            }
        }

        $equipment->update($validated);

        return redirect()
            ->route('equipment.index')
            ->with('success', 'Equipamento atualizado com sucesso.');
    }

    public function destroy(Equipment $equipment): RedirectResponse
    {
        $this->authorizeUnitAccess($equipment->unit_id);
        $equipment->delete();

        return redirect()
            ->route('equipment.index')
            ->with('success', 'Equipamento removido com sucesso.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'unit_id' => ['required', 'exists:units,id'],
            'department_id' => ['nullable', 'exists:departments,id'],
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'ip_address' => ['nullable', 'ip'],
            'mac_address' => ['nullable', 'string', 'max:255'],
            'asset_tag' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:ativo,manutencao,inativo'],
            'installation_date' => ['nullable', 'date'],
            'responsible_name' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
        ]);
    }

    private function types(): array
    {
        return [
            'Servidor',
            'Desktop',
            'Laptop',
            'Tablet Ruggedized',
            'Roteador SD-WAN',
            'Access Point Wi-Fi 6 Outdoor',
            'Gateway LoRaWAN',
            'Câmera IP',
            'Biometria',
            'Robô de Ordenha',
            'Sensor IoT',
            'Switch',
            'Firewall',
        ];
    }

    private function statuses(): array
    {
        return [
            'ativo' => 'Ativo',
            'manutencao' => 'Em manutenção',
            'inativo' => 'Inativo',
        ];
    }
    private function authorizeUnitAccess(?int $unitId): void
    {
        $user = auth()->user();

        if (! $user->canSeeAllUnits() && $user->unit_id !== $unitId) {
            abort(403, 'Você não tem permissão para acessar dados desta unidade.');
        }
    }
}
