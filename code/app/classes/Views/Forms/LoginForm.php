<?php


namespace App\Views\Forms;

use Core\Views\Form;

class LoginForm extends Form
{
    public function __construct()
    {
        $form_array = [
            'attr' => [
                'method' => 'POST',
                'id' => 'login'
            ],
            'fields' => [
                'email' => [
                    'label' => 'Email',
                    'type' => 'email',
                    'value' => '',
                    'validators' =>
                        [
                            'validate_field_not_empty',
                        ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter Your Email'
                        ]
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'type' => 'password',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Password'
                        ]

                    ],
                ],
            ],
            'buttons' => [
                'login' => [
                    'title' => 'Login',
                ],
            ],
            'validators' => [
                'validate_login'
            ],
        ];

        parent::__construct($form_array);
    }
}

