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
                            @foreach($examinations as $exam)
                                <tr>
                                    <td>
                                        @switch($exam->hand)
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
                                        @switch($exam->spiral_type)
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
                                        @switch($exam->bad_effects)
                                            @case("C")
                                                Кофе
                                                @break
                                            @case("E")
                                                Энергетические напитки
                                                @break
                                            @case("S")
                                                Сигареты, кальян, сигары и тд
                                                @break
                                            @case("A")
                                                Алкогольсодержащие напитки
                                                @break
                                            @case("D")
                                                Спиртосодержащие лекарства (валокордин, валосердин и тд)
                                                @break
                                            @case("P")
                                                Физические нагрузки
                                                @break
                                            @case("N")
                                                Ничего
                                                @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <a href="{{ route('exams.show', $exam) }}">
                                            {{ $exam->exam_date . " " . $exam->exam_time }}
                                        </a>
                                    </td>
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


