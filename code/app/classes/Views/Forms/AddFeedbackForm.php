<?php

namespace App\Views\Forms;


use Core\Views\Form;

class AddFeedbackForm extends Form
{
    public function __construct()
    {
        $form_array = [
            'attr' => [
                'method' => 'POST',
            ],
            'fields' => [
                'comment' => [
                    'label' => '',
                    'type' => 'text',
                    'value' => '',
                    'validators' =>
                        [
                            'validate_field_not_empty',
                            'validate_field_max_symbols' => [
                                'max' => 500,
                            ],
                        ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Leave your comment here...'
                        ]
                    ]
                ],

            ],

            'buttons' => [
                'add_feedback' => [
                    'title' => 'Leave comment',
                ],
            ],
            'validators' => [],

        ];

        parent::__construct($form_array);
    }
}