<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function main(){
        return view('main');
    }

    public function annuitet(){
        return view('annuitet');
    }

    public function diff(){
        return view('diff');
    }

    public function calculate(Request $request){
    $loanAmount = $request->input('loan_amount');
    $loanTerm = $request->input('loan_term');
    $interestRate = $request->input('interest_rate') / 100;
    $downPayment = $request->input('down_payment');

    $monthlyInterest = $interestRate / 12;
    $monthlyPayment = ($loanAmount - $downPayment) * ($monthlyInterest * pow(1 + $monthlyInterest, $loanTerm)) / (pow(1 + $monthlyInterest, $loanTerm) - 1);
    $totalPayment = $monthlyPayment * $loanTerm;
    $overpayment = $totalPayment - ($loanAmount - $downPayment);

    return view('annuitet', [
        'monthly_payment' => round($monthlyPayment, 2),
        'overpayment' => round($overpayment, 2)
    ]);
    }

    public function calculateDifferentiated(Request $request){
    $loanAmount = $request->input('loan_amount_diff');
    $loanTerm = $request->input('loan_term_diff');
    $interestRate = $request->input('interest_rate_diff') / 100;
    $downPayment = $request->input('down_payment_diff');

    $monthlyInterest = $interestRate / 12;

    $differentiated_payments = [];

    for ($month = 1; $month <= $loanTerm; $month++) {
        $monthly_payment = ($loanAmount - $downPayment) / $loanTerm + ($loanAmount - $downPayment - (($month - 1) * (($loanAmount - $downPayment) / $loanTerm))) * $monthlyInterest;
        $differentiated_payments[$month] = round($monthly_payment, 2);
    }

    return view('diff', [
        'differentiated_payments' => $differentiated_payments,
    ]);
    }
}
