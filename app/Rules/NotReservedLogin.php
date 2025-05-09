<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NotReservedLogin implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(stripos($value, 'admin') !== false || stripos($value, 'moderator') !== false){
          $fail('Логін не має бути "admin" або "moderator" (case-insensitive).');
        }

    }
}
