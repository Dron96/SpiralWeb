<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExaminationRequest;
use App\Models\Examination;
use App\Models\Patient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class ExaminationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param ExaminationRequest $request
     * @return Response
     */
    public function store(ExaminationRequest $request)
    {
        $validatedData = $request->validated();

        return Patient::create($validatedData);
    }

    /**
     * Display the specified resource.
     *
     * @param Patient $patient
     * @return Application|Factory|View|Response
     */
    public function show(Patient $patient)
    {
        $select = [
            "id",
            "patient_id",
            "hand",
            "type",
            "bad_effects",
            "exam_date",
            "exam_time"
        ];

        $examinations = Examination::query()
            ->where('patient_id', $patient->id)
            ->select($select)
            ->get();

        return view('patients.examination', compact(['examinations', 'patient']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Examination $examination
     * @return Application|Factory|View|Response
     */
    public function showExaminationResult(Examination $examination)
    {
        $resultUrl = "http://127.0.0.1:5000/api/exam/$examination->id/desc";
        $graphUrl = "http://127.0.0.1:5000/api/exam/$examination->id/graph";
        $response = Http::get($resultUrl);
        $result = $response->body();

        return view('patients.result', compact(['result', 'graphUrl']));
    }
}
