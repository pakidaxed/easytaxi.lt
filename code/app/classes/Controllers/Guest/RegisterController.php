<?php


namespace App\Controllers\Guest;

use App\Abstracts\GuestController;
use App\App;
use App\Users\User;
use App\Views\Forms\RegisterForm;
use App\Views\Pages\BasePage;
use Core\Views\Content;

class RegisterController extends GuestController
{
    /**
     * Registering the user
     *
     * @return string|null
     */
    function index(): ?string
    {
        $registerForm = new RegisterForm();

        if ($registerForm->isSubmitted()) {
            if ($registerForm->validate()) {
                $user = new User($registerForm->getSubmitData());
                $user->setRegistered();
                $added = App::$db->insertRow('users', $user->_getData());
                $registerForm->setMessage('Registration successful');
                var_dump($user->_getData());
            }
        }
        $content = new Content(['form' => $registerForm->render()]);

        $indexPage = new BasePage();
        $indexPage->setTitle('New user registration');
        $indexPage->setContent($content->render('register.tpl.php'));
        return $indexPage->render();
    }
}