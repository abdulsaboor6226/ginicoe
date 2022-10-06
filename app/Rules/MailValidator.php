<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;
class MailValidator implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (Str::contains(Str::lower($value), ['@gmail.com','@outlook.com','@hotmail.com','@yahoo.com','@corporate.com','@icloud.com','@yandex.com','@proton.com','@zoho.com','@tutanota.com','@aol.com'])) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Only Gmail Outlook Hotmail Yahoo Corporate iCloud Yandex Proton Zoho Tutanota and AOL mail is Allow.';
    }
}
