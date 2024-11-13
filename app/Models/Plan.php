<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    /** @use HasFactory<\Database\Factories\PlanFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
    ];

    public function comboPlans()
    {
        return $this->belongsToMany(ComboPlan::class, 'combo_plan_plan')->withTimestamps();
    }

    public function scopeSearch($query, $search)
    {
        if (! $search) {
            return $query;
        }

        return $query->where('name', 'like', '%'.$search.'%');
    }
}
