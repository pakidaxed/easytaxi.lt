<?php

namespace App\Controllers\Guest;

use App\Abstracts\GuestController;
use App\App;
use App\Views\Pages\IndexPage;
use Core\Views\Content;

class FeedbacksController extends GuestController
{
    /**
     * Showing feedback to the guest users
     *
     * @return string|null
     */
    function index(): ?string
    {
        $feedbacks = App::$db->getRowsWhere('feedbacks', []);

        $content = new Content(['feedbacks' => array_reverse($feedbacks)]);

        $indexPage = new IndexPage();
        $indexPage->setTitle('Customer feedbacks');
        $indexPage->setContent($content->render('feedbacks.tpl.php'));
        return $indexPage->render();
    }
}