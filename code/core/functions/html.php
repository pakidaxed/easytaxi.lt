<?php
/**
 * Generates tag attributes
 *
 * @param array $attrs
 * @return string
 */
function html_attr(array $attrs): string
{
    $attributes = [];

    foreach ($attrs as $key => $attr) {
        if (!is_bool($attr)) {
            $attributes[] = "$key=\"$attr\"";
        } else {
            $attributes[] = $key;
        }
    }

    return implode(' ', $attributes);
}

/**
 * Generating new input field from given array
 *
 * @param string $field_id
 * @param array $field
 * @return string
 */
function input_attr(string $field_id, array $field): string
{
    $attributes = [
        'name' => $field_id,
        'type' => $field['type'],
        'value' => $field['value'] ?? ''
    ];

    $attributes += $field['extra']['attr'] ?? [];

    return html_attr($attributes);
}

/**
 * Generating select attributes
 *
 * @param string $select_id
 * @param array $select
 * @return string
 */
function select_attr(string $select_id, array $select): string
{
    $attributes = [
        'name' => $select_id,
    ];

    $attributes += $select['extra']['attr'] ?? [];

    return html_attr($attributes);
}

/**
 * Generating option attributes and checking for value if selected
 *
 * @param string $option_id
 * @param array $field
 * @return string
 */
function option_attr(string $option_id, array $field): string
{
    $option = $field['options'][$option_id];
    $attributes = [
        'value' => $option_id,
    ];

    if ($field['value'] == $option_id) $attributes['selected'] = true;
    if (is_array($option)) $attributes += $option['attr'];

    return html_attr($attributes);
}

/**
 * Generating radio attributes
 *
 * @param $field_id
 * @param string $radio_id
 * @param array $radio
 * @return string
 */
function radio_attr($field_id, string $radio_id, array $radio): string
{
    $attributes = [
        'name' => $radio_id,
        'value' => $radio_id,
        'id' => $field_id
    ];

    if ($radio['value'] == $radio_id) $attributes['checked'] = true;
   // if (is_array($radio)) $attributes += $radio['attr'];

    return html_attr($attributes);
}

/**
 * Generating buttons from given array
 *
 * @param string $button_id
 * @param array $button
 * @return string
 */
function button_attr(string $button_id, array $button): string
{
    $attributes = [
        'name' => 'action',
        'value' => $button_id,
    ];

    $attributes += $button['extra']['attr'] ?? [];

    return html_attr($attributes);
}

/**
 * Sanitizing $_POST request
 *
 * @param array $fields
 * @return array
 */
function sanitize_form_input_post(array $fields): array
{
    $filter_params = [];

    foreach ($fields as $field_key => $field_value) {
        $filter_params[$field_key] = $field_value['filter'] ?? FILTER_SANITIZE_SPECIAL_CHARS;
    }

    return filter_input_array(INPUT_POST, $filter_params);
}

/**
 * Validating empty form fields from sanitized inputs
 *
 * @param array $form
 * @param array $form_values
 * @return bool
 */
function validate_form(array &$form, array $form_values)
{
    $success = true;
    foreach ($form['fields'] as $field_key => &$field) {
        foreach ($field['validators'] ?? [] as $key => $validator) {
            $validate = !is_array($validator) ? $validator : $key;
            if ($validate($form_values[$field_key], $field, $validate != $validator ? $validator : [])) {
                $field['value'] = $form_values[$field_key];
            } else {
                $success = false;
            }
        }
    }
    foreach ($form['validators'] as $key => $validator) {
        $validate = !is_array($validator) ? $validator : $key;
        if (!$validate($form_values, $form, $validate != $validator ? $validator : [])) {
            $success = false;
        }
    }

    return $success;
}



