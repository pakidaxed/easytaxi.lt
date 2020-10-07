<?php


namespace App\Controllers\Guest;


use App\Abstracts\GuestController;
use App\App;
use App\Views\Forms\LoginForm;
use App\Views\Pages\BasePage;
use Core\Router;
use Core\Views\Content;

class LoginController extends GuestController
{

    /**
     * Logging the user in
     *
     * @return string|null
     */
    function index(): ?string
    {
        $loginForm = new LoginForm();

        if ($loginForm->isSubmitted()) {
            if ($loginForm->validate()) {
                App::$session->login($loginForm->getSubmitData()['email'], $loginForm->getSubmitData()['password']);
                Router::redirect('index');
            }
        }
        $content = new Content(['form' => $loginForm->render()]);

        $indexPage = new BasePage();
        $indexPage->setTitle('User log in');
        $indexPage->setContent($content->render('login.tpl.php'));
        return $indexPage->render();
    }
}