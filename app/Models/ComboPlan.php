<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComboPlan extends Model
{
    /** @use HasFactory<\Database\Factories\ComboPlanFactory> */
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'name',
        'price',
    ];

    public function plans()
    {
        return $this->belongsToMany(ComboPlanPlan::class);
    }
}
