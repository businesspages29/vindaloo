<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComboPlanRequest;
use App\Models\ComboPlan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ComboPlanController extends Controller
{
    public function index()
    {
        $records = ComboPlan::paginate(10);

        return Inertia::render('ComboPlans/Index', ['records' => $records]);
    }

    public function create()
    {
        return Inertia::render('ComboPlans/Create');
    }

    public function store(ComboPlanRequest $request)
    {

        $record = new ComboPlan($request->all());
        $record->save();

        return redirect()->route('comboplans.index');
    }

    public function edit(ComboPlan $record)
    {
        return Inertia::render('ComboPlans/Edit', ['record' => $record]);
    }

    public function update(Request $request, ComboPlan $record)
    {
        $record->update($request->all());

        return redirect()->route('comboplans.index');
    }

    public function destroy(ComboPlan $record)
    {
        $record->delete();

        return redirect()->back();
    }
}
