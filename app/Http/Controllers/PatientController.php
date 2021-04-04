<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $patients = Patient::query()->paginate(10);

        return view('patients.patient', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PatientRequest $request
     * @return JsonResponse
     */
    public function store(PatientRequest $request)
    {
        $patient = Patient::create($request->validated());

        return response()->json($patient, 201);
    }
}
