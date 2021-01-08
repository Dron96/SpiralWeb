<?php

namespace App\Http\Controllers;

use App\Models\Examination;
use App\Models\Patient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $patients = Patient::paginate(10);

        return view('patients.patient', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $patients = Patient::all();

        return view('patients.examination', compact('patients'));
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
        $examinations = Examination::where('patient_id', $patient->id)
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
