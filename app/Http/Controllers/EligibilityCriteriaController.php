<?php

namespace App\Http\Controllers;

use App\Http\Requests\EligibilityCriteriaRequest;
use App\Models\EligibilityCriteria;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EligibilityCriteriaController extends Controller
{
    public function index()
    {
        $records = EligibilityCriteria::paginate(10);

        return Inertia::render('EligibilityCriterias/Index', ['records' => $records]);
    }

    public function create()
    {
        return Inertia::render('EligibilityCriterias/Create');
    }

    public function store(EligibilityCriteriaRequest $request)
    {

        $record = new EligibilityCriteria($request->all());
        $record->save();

        return redirect()->route('eligibilitycriterias.index');
    }

    public function edit(EligibilityCriteria $record)
    {
        return Inertia::render('EligibilityCriterias/Edit', ['record' => $record]);
    }

    public function update(Request $request, EligibilityCriteria $record)
    {
        $record->update($request->all());

        return redirect()->route('eligibilitycriterias.index');
    }

    public function destroy(EligibilityCriteria $record)
    {
        $record->delete();

        return redirect()->back();
    }
}
