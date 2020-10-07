<?php

namespace Core\Views;


class Form extends \Core\Abstracts\Views\Form
{
    public function render(string $template_path = ROOT . '/core/templates/form.tpl.php'): string
    {
        return parent::render($template_path);
    }

    /**
     * Determines which button was pressed by reading "action"
     * index in $_POST.
     * If $_POST is empty, or doesnt contain action, returns null
     *
     * @return string|null
     */
    static function getSubmitAction(): ?string
    {
        if (!isset($_POST) || empty($_POST) || !isset($_POST['action'])) {
            return null;
        } else {
            return $_POST['action'];
        }
    }

    /**
     * Checks if the form is submitted
     *
     * Gets submit action from $_POST, and checks if form array
     * has a button with such index
     *
     * @return bool
     */
    public function isSubmitted(): bool
    {
        return array_key_exists(self::getSubmitAction(), $this->data['buttons']);
    }

    /**
     * Gets form subitted data
     * If $filtered = false, returns $_POST if not empty (or null)
     * If $filtered = true, returns filtered $_POST array
     * based on form array: $this->data
     *
     * DO NOT CALL any functions, it has to be full-code
     *
     * @param bool $filter
     * @return array|null
     */
    public function getSubmitData($filter = true): ?array
    {
        if ($filter) {
            $filter_params = [];
            foreach ($this->data['fields'] as $field_key => $field_value) {
                $filter_params[$field_key] = $field_value['filter'] ?? FILTER_SANITIZE_SPECIAL_CHARS;
            }

            return filter_input_array(INPUT_POST, $filter_params);
        }

        return $_POST;
    }

    /**
     * Validates form based on $this->data
     * Does NOT call any callbacks, just returns the result
     * of the form
     *
     * Does not call function validate_form !!!,
     * implements all functionality inside
     *
     * @return bool
     */
    public function validate(): bool
    {
        $form = &$this->data;
        $form_values = $this->getSubmitData();
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

    public function setMessage(string $message): void
    {
        $this->data['message'] = $message;
    }
}
