<?php

namespace App\Helpers;
use Illuminate\Support\ViewErrorBag;

class Html {
    /**
     * Shortcut for populating checkbox state on forms.
     *
     * If there are failed validation errors, we should use the old() state
     * of the checkbox, ignoring the current DB state of the field; otherwise
     * just use the DB value.
     *
     * @param string $name The input field name
     * @param string $value The current DB value
     * @return string 'checked' or null;
     */
    public static function checked($name, $value) {
        $errors = session('errors');

        if (isset($errors) && $errors instanceof ViewErrorBag && $errors->any()) {
            return old($name) ? 'checked' : '';
        }

        return ($value) ? 'checked' : '';
    }
}