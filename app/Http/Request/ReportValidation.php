<?php

namespace App\Http\Request;


use Illuminate\Support\Facades\Validator;

/**
 * Class ReportValidation
 * @package App\Http\Request
 *  * this class is responsible for validating all input for reportController class
 */
class ReportValidation
{


    public static function validate()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|min:1',
            'collection'=> 'required|integer|exists:App\Collection,id'
        ]);

        if ($validator->fails()) {
            return $validator->messages();
        }
        return true;
    }

    public static function validateWihtoutCollection()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->messages();
        }
        return true;
    }

}