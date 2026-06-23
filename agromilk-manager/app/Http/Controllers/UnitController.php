<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UnitController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        $units = Unit::query()
            ->when(
                ! $user->canSeeAllUnits(),
                fn ($query) => $query->where('id', $user->unit_id)
            )
            ->latest()
            ->paginate(10);

        return view('units.index', compact('units'));
    }

    public function create(): View
    {
        return view('units.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:matriz,filial'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'size:2'],
            'responsible_name' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
            'notes' => ['nullable', 'string'],
        ]);

        $validated['state'] = strtoupper($validated['state']);
        $validated['is_active'] = $request->boolean('is_active');

        Unit::create($validated);

        return redirect()
            ->route('units.index')
            ->with('success', 'Unidade cadastrada com sucesso.');
    }

    public function show(Unit $unit): View
    {
        $this->authorizeUnitAccess($unit->id);
        $unit->load(['departments', 'users']);

        return view('units.show', compact('unit'));
    }

    public function edit(Unit $unit): View
    {
        $this->authorizeUnitAccess($unit->id);
        return view('units.edit', compact('unit'));
    }

    public function update(Request $request, Unit $unit): RedirectResponse
    {
        $this->authorizeUnitAccess($unit->id);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:matriz,filial'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'size:2'],
            'responsible_name' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
            'notes' => ['nullable', 'string'],
        ]);

        $validated['state'] = strtoupper($validated['state']);
        $validated['is_active'] = $request->boolean('is_active');

        $unit->update($validated);

        return redirect()
            ->route('units.index')
            ->with('success', 'Unidade atualizada com sucesso.');
    }

    public function destroy(Unit $unit): RedirectResponse
    {
        $this->authorizeUnitAccess($unit->id);
        $unit->delete();

        return redirect()
            ->route('units.index')
            ->with('success', 'Unidade removida com sucesso.');
    }
    private function authorizeUnitAccess(?int $unitId): void
    {
        $user = auth()->user();

        if (! $user->canSeeAllUnits() && $user->unit_id !== $unitId) {
            abort(403, 'Você não tem permissão para acessar dados desta unidade.');
        }
    }
}
