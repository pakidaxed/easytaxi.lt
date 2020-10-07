<?php

namespace App\Views\Forms;

use Core\Views\Form;

class RegisterForm extends Form
{
    public function __construct()
    {
        $form_array = [
            'attr' =>
                [
                    'action' => 'register',
                    'method' => 'POST',
                    'class' => 'my-form',
                    'id' => 'stable-form'
                ],
            'fields' => [
                'firstname' => [
                    'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
                    'label' => 'Firstname',
                    'type' => 'text',
                    'value' => '',
                    'extra' => [
                        'attr' => [
                            'class' => 'input-field',
                            'placeholder' => 'Firstname',
                        ]
                    ],
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_correct_name',
                        'validate_only_letters',
                        'validate_field_max_symbols' => [
                            'max' => 40,
                        ],
                    ]
                ],
                'lastname' => [
                    'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
                    'label' => 'Lastname',
                    'type' => 'text',
                    'value' => '',
                    'extra' => [
                        'attr' => [
                            'class' => 'input-field',
                            'placeholder' => 'Lastname',
                        ]
                    ],
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_correct_name',
                        'validate_field_max_symbols' => [
                            'max' => 40,
                        ],
                        'validate_only_letters',
                    ]
                ],
                'email' => [
                    'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
                    'label' => 'E-mail',
                    'type' => 'email',
                    'value' => '',
                    'extra' => [
                        'attr' => [
                            'class' => 'input-field',
                            'placeholder' => 'example@example.com',
                        ]
                    ],
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_user_unique'
                    ]
                ],
                'password' => [
                    'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
                    'label' => 'Password',
                    'type' => 'password',
                    'value' => '',
                    'extra' => [
                        'attr' => [
                            'class' => 'input-field',
                            'placeholder' => 'Password',
                        ]
                    ],
                    'validators' => [
                        'validate_field_not_empty',
                    ]
                ],
                'confirm_password' => [
                    'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
                    'label' => 'Confirm password',
                    'type' => 'password',
                    'value' => '',
                    'extra' => [
                        'attr' => [
                            'class' => 'input-field',
                            'placeholder' => 'Confirm Password',
                        ]
                    ],
                    'validators' => [
                        'validate_field_not_empty',
                    ]
                ],
                'phone' => [
                    'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
                    'label' => 'Phone number',
                    'type' => 'tel',
                    'value' => '',
                    'extra' => [
                        'attr' => [
                            'class' => 'input-field',
                            'placeholder' => '86XXXXXXX',
                        ]
                    ],
                    'validators' => [
                    ]
                ],
                'address' => [
                    'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
                    'label' => 'Home address',
                    'type' => 'text',
                    'value' => '',
                    'extra' => [
                        'attr' => [
                            'class' => 'input-field',
                            'placeholder' => 'Milton str. 10, Midway rd. Virginia',
                        ]
                    ],
                    'validators' => [
                    ]
                ],
            ],

            'buttons' => [
                'save' => [
                    'title' => 'Register',
                    'extra' => [
                        'attr' => [
                            'class' => 'btn-submit',

                        ]
                    ]
                ]
            ],
            'validators' => [
                'validate_fields_match' => [
                    'password',
                    'confirm_password'
                ]
            ]
        ];

        parent::__construct($form_array);
    }
}