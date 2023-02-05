<?php

namespace App\Rules;
namespace App\Http\Controllers\Auth;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MatchOldPassword implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */

    public function passes($attribute, $value)
    {
        return Hash::check($value, Auth()::user()->password);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */

    public function message()
    {
        return 'The :attribute is match with old password.';
    }
}
