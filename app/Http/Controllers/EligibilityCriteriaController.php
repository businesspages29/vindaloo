<?php

namespace App\Http\Controllers;

use App\Http\Requests\EligibilityCriteriaRequest;
use App\Models\EligibilityCriteria;
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

    public function edit($id)
    {
        $record = EligibilityCriteria::find($id);

        return Inertia::render('EligibilityCriterias/Edit', ['record' => $record]);
    }

    public function update(EligibilityCriteriaRequest $request, $id)
    {
        $record = EligibilityCriteria::find($id);
        $record->update($request->all());

        return redirect()->route('eligibilitycriterias.index');
    }

    public function destroy(EligibilityCriteria $record)
    {
        $record->delete();

        return redirect()->back();
    }
}
