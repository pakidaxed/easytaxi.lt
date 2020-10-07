<?php

namespace App\Controllers\Guest;

use App\Abstracts\GuestController;
use App\Views\Pages\BasePage;
use Core\Views\Content;

class DefaultController extends GuestController
{



    /**
     * Default controller for showing index
     *
     * @return string|null
     */
    function index(): ?string
    {
        $content = new Content();

        $indexPage = new BasePage();
        $indexPage->setTitle('Welcome');
        $indexPage->setContent($content->render('index.tpl.php'));
        return $indexPage->render();
    }

}