<?php

use App\App;

/**
 * Checking for existing users to prevent registration
 *
 * @param string $form_field
 * @param array $form
 * @return bool
 */
function validate_user_unique(string $form_field, array &$form): bool
{
    $valid = App::$db->getRowsWhere('users', ['email' => $form_field]);
    if ($valid) {
        $form['error'] = "User <b>$form_field</b> already registered";
        return false;
    }
    return true;
}

/**
 * Validating login
 *
 * @param array $form_values
 * @param array $form
 * @return bool
 */
function validate_login(array $form_values, array &$form): bool
{
    $valid = App::$session->login($form_values['email'], $form_values['password']);
    if ($valid) {
        return true;
    }
    $form['error'] = "Login failed";
    return false;
}

