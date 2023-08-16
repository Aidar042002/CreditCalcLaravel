@extends('layout')

@section('content')
<div>
        <h1>Рассчет дифференцированного платежа</h1>
        <form method="post" action="{{ route('calculate_differentiated') }}">
            @csrf
            <label for="loan_amount_diff">Сумма кредита:</label>
            <input type="number" name="loan_amount_diff" required><br>

            <label for="loan_term_diff">Срок в месяцах:</label>
            <input type="number" name="loan_term_diff" required><br>

            <label for="interest_rate_diff">Процентная ставка (%):</label>
            <input type="number" name="interest_rate_diff" required><br>

            <label for="down_payment_diff">Первоначальный взнос:</label>
            <input type="number" name="down_payment_diff" required><br>

            <button type="submit">Рассчитать</button>
        </form>

        @if(isset($differentiated_payments))
            <div>
                <h2>Рассчет выплат за каждый месяц</h2>
                <table class="mx-auto">
                    <thead>
                        <tr>
                            <th>Месяц</th>
                            <th>Платеж</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($differentiated_payments as $month => $payment)
                            <tr>
                                <td>{{ $month }}</td>
                                <td>{{ $payment }}Р</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection