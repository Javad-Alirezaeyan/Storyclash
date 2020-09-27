<?php

namespace App\Http\Request;


use Illuminate\Support\Facades\Validator;

/**
 * Class CollectionValidation
 * @package App\Http\Request
 * this class is responsible for validating all input for collectionController class
 */
class CollectionValidation
{


    /**
     * @return bool
     */
    public static function validate()
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