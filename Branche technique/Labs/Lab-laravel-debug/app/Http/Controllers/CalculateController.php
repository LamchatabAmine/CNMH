<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculateController extends Controller
{
    public function calculate()
    {
        $num1 = 5;
        $num2 = 5;

        $result = $this->sum($num1, $num2);

        return view('index', compact('result'));
    }

    public function sum($num1, $num2)
    {
        return $num1 + $num2;
    }

}
