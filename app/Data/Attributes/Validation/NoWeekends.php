<?php

namespace App\Data\Attributes\Validation;

use Attribute;
use Carbon\Carbon;
use Spatie\LaravelData\Support\Validation\ValidationRule;

#[Attribute]

class NoWeekends extends ValidationRule
{
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        $date = Carbon::parse($value);
       if($date->IsWeekend())
        {
            $fail("Das gewählte Datum für :attribute lieght auf einem Wochenende. Wir schulen nur MO-FR");
        };
    }
}
