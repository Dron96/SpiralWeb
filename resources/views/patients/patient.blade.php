@extends('test')

@section('header')
    Пациенты
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
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Фамилия</th>
                                <th>Имя</th>
                                <th>Отчество</th>
                                <th>Дата рождения</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($patients as $patient)
                                <tr>
                                    <td><a href="{{ route('patient.show', $patient) }}">
                                            {{ $patient->second_name }}
                                        </a>
                                    </td>
                                    <td>{{ $patient->first_name }}</td>
                                    <td>{{ $patient->middle_name }}</td>
                                    <td>{{ $patient->dob }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if($patients->total() > $patients->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $patients->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
