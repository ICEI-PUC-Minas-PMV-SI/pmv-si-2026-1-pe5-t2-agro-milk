<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Equipment extends Model
{
    protected $table = 'equipment';

    protected $fillable = [
        'unit_id',
        'department_id',
        'name',
        'type',
        'ip_address',
        'mac_address',
        'asset_tag',
        'status',
        'installation_date',
        'responsible_name',
        'notes',
    ];

    protected $casts = [
        'installation_date' => 'date',
    ];

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
