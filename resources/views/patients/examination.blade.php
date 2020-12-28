@extends('test')

@section('header')
    Исследования
    пациента: {{ $patient->second_name }}
    {{ mb_substr($patient->first_name, 0, 1) }}.
    {{ mb_substr($patient->middle_name, 0, 1) }}.
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{ route('patients.create') }}">Добавить</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Используемая рука</th>
                                <th>Тип исследования</th>
                                <th>Нежелательные эффекты</th>
                                <th>Дата исследования</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($examinations as $exam)
                                <tr>
                                    <td>{{ $exam->hand }}</td>
                                    <td>{{ $exam->type }}</td>
                                    <td>{{ $exam->bad_effects }}</td>
                                    <td>{{ $exam->exam_date . $exam->exam_time }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


