<?php
/**
 * Checking for empty inputs
 *
 * @param string|null $form_field
 * @param array $field
 * @return bool
 */
function validate_field_not_empty(?string $form_field, array &$field): bool
{
    if (empty(trim($form_field))) {
        $field['error'] = 'Empty field';
        return false;
    }
    return true;
}

/**
 * Validating name that is no more than one word
 *
 * @param string|null $form_field
 * @param array $field
 * @return bool
 */
function validate_correct_name(?string $form_field, array &$field): bool
{
    $words = str_word_count($form_field);
    if ($words > 1) {
        $field['error'] = 'It should contain only one word';
        return false;
    }
    return true;
}

/**
 * Validating name that is no more than one word
 *
 * @param string|null $form_field
 * @param array $field
 * @return bool
 */
function validate_only_letters(?string $form_field, array &$field): bool
{
    if (!empty($form_field)) {
        $cleaning = str_split($form_field, 1);
        foreach ($cleaning as $letter) {
            if (!preg_match('/[a-zA-Z]/', $letter)) {
                $field['error'] = 'Please use only letters';
                return false;
            }
        }
    }
    return true;
}


/**
 * Validating password match
 *
 * @param array $form_field
 * @param array $form
 * @param array|null $params
 * @return bool
 */
function validate_fields_match(array $form_field, array &$form, array $params): bool
{
    $reference_value = $form_field[$params[0]];
    foreach ($params as $param) {
        $field_value = $form_field[$param];
        if ($field_value != $reference_value) {
            $form['error'] = 'Passwords doesn`t match';
            return false;
        }
    }
    return true;
}

function validate_field_max_symbols(string $field_value, array &$field, array $params): bool
{
    if (strlen($field_value) > $params['max']) {
        $field['error'] = 'Maximum ' . $params['max'] . ' symbols allowed';
        return false;
    }
    return true;
}