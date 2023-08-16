@extends('layout')
@section('content')
    <h2>Калькулятор для расчета кредита<br>Выберите тип кредита:</h2>
    <div class="d-flex flex-column align-items-center mt-3">
        <a href="/annuitet" class="btn btn-primary btn-lg w-50">Аннуитентный</a>
        <a href="/diff" class="btn btn-primary mt-3 btn-lg w-50">Дифференцированный</a>
    </div>
@endsection