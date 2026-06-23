<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Equipment;
use App\Models\Unit;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $user = auth()->user();

        $unitFilter = fn ($query) => $query->when(
            ! $user->canSeeAllUnits(),
            fn ($q) => $q->where('unit_id', $user->unit_id)
        );

        $stats = [
            'users' => User::query()
                ->when(! $user->canSeeAllUnits(), fn ($q) => $q->where('unit_id', $user->unit_id))
                ->count(),

            'units' => Unit::query()
                ->when(! $user->canSeeAllUnits(), fn ($q) => $q->where('id', $user->unit_id))
                ->count(),

            'departments' => Department::query()
                ->tap($unitFilter)
                ->count(),

            'equipment' => Equipment::query()
                ->tap($unitFilter)
                ->count(),

            'equipment_active' => Equipment::query()
                ->tap($unitFilter)
                ->where('status', 'ativo')
                ->count(),

            'equipment_maintenance' => Equipment::query()
                ->tap($unitFilter)
                ->where('status', 'manutencao')
                ->count(),

            'equipment_inactive' => Equipment::query()
                ->tap($unitFilter)
                ->where('status', 'inativo')
                ->count(),
        ];

        $latestEquipment = Equipment::query()
            ->with(['unit', 'department'])
            ->tap($unitFilter)
            ->latest()
            ->limit(5)
            ->get();

        $units = Unit::query()
            ->when(! $user->canSeeAllUnits(), fn ($q) => $q->where('id', $user->unit_id))
            ->withCount(['departments', 'equipment'])
            ->orderBy('name')
            ->get();

        return view('dashboard', compact('stats', 'latestEquipment', 'units'));
    }
}
