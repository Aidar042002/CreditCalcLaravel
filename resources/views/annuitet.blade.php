@extends('layout')

@section('content')
<div>
        <h1>Рассчет аннуитентного платежа</h1>
        <form method="post" action="{{ route('calculate') }}">
            @csrf
            <label for="loan_amount">Сумма кредита:</label>
            <input type="number" name="loan_amount" required><br>

            <label for="loan_term">Срок в месяцах:</label>
            <input type="number" name="loan_term" required><br>

            <label for="interest_rate">Процентная ставка (%):</label>
            <input type="number" name="interest_rate" required><br>

            <label for="down_payment">Первоначальный взнос</label>
            <input type="number" name="down_payment" required><br>

            <button type="submit">Расссчитать</button>
        </form>

        @if(isset($monthly_payment) && isset($overpayment))
            <div>
                <h2>Итоговый рассчет</h2>
                <p>Ежемесячный платеж: {{ $monthly_payment }}Р</p>
                <p>Переплата: {{ $overpayment }}Р</p>
            </div>
        @endif
    </div>
@endsection