<?php

namespace App\Http\Controllers;

use App\TempCalculator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

class TempCalculatorController extends Controller
{

    /**
     * @return array
     */

    public function index()
    {

        if (!view()->exists('home.index')) {
            return [
                'apiResponse' => [
                    'result' => 'Fail',
                    'message' => 'View does not exists',
                ]
            ];
        }

        return view('home.index');



    }

    /**
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $input = Input::all();
        $t = new TempCalculator();
        $t->f = $input['f'];
        $t->c = $input['c'];
        $inserted = $t->save();

        if(isset($inserted)){

            return [
                'apiResponse' => [
                    'result' => 'TRUE'
                ]
            ];

        } else {

            return [
                'apiResponse' => [
                    'result' => 'FALSE'
                ]
            ];
        }
    }

}
