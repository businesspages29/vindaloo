<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComboPlanRequest;
use App\Models\ComboPlan;
use App\Models\Plan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ComboPlanController extends Controller
{
    public function index()
    {
        $records = ComboPlan::paginate(10);

        return Inertia::render('ComboPlans/Index', ['records' => $records]);
    }

    // plans for search api
    public function planAjax(Request $request)
    {
        $inputs = $request->only('search');
        $records = Plan::search($inputs['search'])->limit(10)->pluck('name', 'id');

        return response()->json($records);
    }

    public function create()
    {
        return Inertia::render('ComboPlans/Create');
    }

    public function store(Request $request)
    {
        $inputs = $request->only('name', 'price', 'plans');
        $plans = $inputs['plans'];
        unset($inputs['plans']);
        $record = new ComboPlan($inputs);
        $record->save();
        $plans = ($plans['code']) ? [$plans['code']] : [];
        $record->plans()->sync($plans);

        return redirect()->route('comboplans.index');
    }

    public function edit($id)
    {
        $record = ComboPlan::find($id);

        return Inertia::render('ComboPlans/Edit', ['record' => $record]);
    }

    public function update(ComboPlanRequest $request, $id)
    {
        $record = ComboPlan::find($id);
        $record->update($request->all());

        return redirect()->route('comboplans.index');
    }

    public function destroy(ComboPlan $record)
    {
        $record->delete();

        return redirect()->back();
    }
}
