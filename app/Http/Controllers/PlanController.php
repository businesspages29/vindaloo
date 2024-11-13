<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PlanController extends Controller
{
    public function index()
    {
        $records = Plan::paginate(10);

        return Inertia::render('Plans/Index', ['records' => $records]);
    }

    public function create()
    {
        return Inertia::render('Plans/Create');
    }

    public function store(PlanRequest $request)
    {

        $record = new Plan($request->all());
        $record->save();

        return redirect()->route('plans.index');
    }

    public function edit(Plan $record)
    {
        return Inertia::render('Plans/Edit', ['record' => $record]);
    }

    public function update(Request $request, Plan $record)
    {
        $record->update($request->all());

        return redirect()->route('plans.index');
    }

    public function destroy(Plan $record)
    {
        $record->delete();

        return redirect()->back();
    }
}
