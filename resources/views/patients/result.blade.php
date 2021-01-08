@extends('test')

@section('header')
{{--    Исследования--}}
{{--    пациента: {{ $patient->second_name }}--}}
{{--    {{ mb_substr($patient->first_name, 0, 1) }}.--}}
{{--    {{ mb_substr($patient->middle_name, 0, 1) }}.--}}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{ route('patients.index') }}">Добавить</a>
                </nav>
                <div class="card">
                    <div class="card-body">

                        <style type="text/css">
                            td {
                                text-align: center;
                            }
                            tr {
                                text-align: center;
                            }
                            th {
                                text-align: center;
                            }
                        </style>

                        {!! $result !!}

                        <img src="{{ $graphUrl }}" alt="graph" />


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


