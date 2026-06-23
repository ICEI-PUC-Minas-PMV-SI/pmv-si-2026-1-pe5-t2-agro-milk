<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class DepartmentController extends Controller
{

    public function index(): View
    {
        $user = auth()->user();

        $departments = Department::query()
            ->with('unit')
            ->when(
                ! $user->canSeeAllUnits(),
                fn ($query) => $query->where('unit_id', $user->unit_id)
            )
            ->latest()
            ->paginate(10);

        return view('departments.index', compact('departments'));
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

        return view('departments.create', compact('units'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'unit_id' => ['required', 'exists:units,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->boolean('is_active');

        $exists = Department::query()
            ->where('unit_id', $validated['unit_id'])
            ->where('slug', $validated['slug'])
            ->exists();

        if ($exists) {
            return back()
                ->withInput()
                ->withErrors([
                    'name' => 'Já existe um departamento com esse nome nesta unidade.',
                ]);
        }

        Department::create($validated);

        return redirect()
            ->route('departments.index')
            ->with('success', 'Departamento cadastrado com sucesso.');
    }

    public function show(Department $department): View
    {
        $this->authorizeUnitAccess($department->unit_id);
        $department->load(['unit', 'users']);

        return view('departments.show', compact('department'));
    }

    public function edit(Department $department): View
    {

        $this->authorizeUnitAccess($department->unit_id);
        $units = Unit::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('departments.edit', compact('department', 'units'));
    }

    public function update(Request $request, Department $department): RedirectResponse
    {

        $this->authorizeUnitAccess($department->unit_id);
        $validated = $request->validate([
            'unit_id' => ['required', 'exists:units,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->boolean('is_active');

        $exists = Department::query()
            ->where('unit_id', $validated['unit_id'])
            ->where('slug', $validated['slug'])
            ->where('id', '!=', $department->id)
            ->exists();

        if ($exists) {
            return back()
                ->withInput()
                ->withErrors([
                    'name' => 'Já existe um departamento com esse nome nesta unidade.',
                ]);
        }

        $department->update($validated);

        return redirect()
            ->route('departments.index')
            ->with('success', 'Departamento atualizado com sucesso.');
    }

    public function destroy(Department $department): RedirectResponse
    {

        $this->authorizeUnitAccess($department->unit_id);
        $department->delete();

        return redirect()
            ->route('departments.index')
            ->with('success', 'Departamento removido com sucesso.');
    }

    private function authorizeUnitAccess(?int $unitId): void
    {
        $user = auth()->user();

        if (! $user->canSeeAllUnits() && $user->unit_id !== $unitId) {
            abort(403, 'Você não tem permissão para acessar dados desta unidade.');
        }
    }
}
