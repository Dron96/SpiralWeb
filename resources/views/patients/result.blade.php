@extends('test')

@section('header')
    Исследование
    пациента: {{ $patient->second_name }}
    {{ mb_substr($patient->first_name, 0, 1) }}.
    {{ mb_substr($patient->middle_name, 0, 1) }}.
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
{{--                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">--}}
{{--                    <a class="btn btn-primary" href="{{ route('patients.index') }}">Добавить</a>--}}
{{--                </nav>--}}
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
                                <tr>
                                    <td>
                                        @switch($examination->hand)
                                            @case("R")
                                            Правая
                                            @break
                                            @case("L")
                                            Левая
                                            @break
                                            @case("B")
                                            Обе
                                            @break
                                        @endswitch
                                    </td>
                                    <td>
                                        @switch($examination->spiral_type)
                                            @case("Sp")
                                            Спираль
                                            @break
                                            @case("In")
                                            Врисование
                                            @break
                                            @case("Cp")
                                            Копия
                                            @break
                                        @endswitch
                                    </td>
                                    <td>
                                        @for ($i = 0; $i < strlen($examination->bad_effects); $i++)
                                            @switch($examination->bad_effects[$i])
                                                @case("C")
                                                <li>Кофе</li>
                                                @break
                                                @case("E")
                                                <li>Энергетические напитки</li>
                                                @break
                                                @case("S")
                                                <li>Сигареты, кальян, сигары и тд</li>
                                                @break
                                                @case("A")
                                                <li>Алкогольсодержащие напитки</li>
                                                @break
                                                @case("D")
                                                <li>Спиртосодержащие лекарства (валокордин, валосердин и тд)</li>
                                                @break
                                                @case("P")
                                                <li>Физические нагрузки</li>
                                                @break
                                                @case("N")
                                                <li>Ничего</li>
                                                @break
                                            @endswitch
                                        @endfor
                                    </td>
                                    <td>
                                        <a href="{{ route('exams.show', $examination) }}">
                                            {{ $examination->exam_date . " " . $examination->exam_time }}
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        {!! $result !!}

                        <img src="{{ $graphUrl }}" alt="graph" />


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


