<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class BrojUgovoraRule implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        return preg_match("/^[0-9]{1,3}\-[0-9]{2}$/", $value);
    }

    public function message()
    {
        return 'Broj ugovora mora biti u formatu xxx-xx';
    }
}
