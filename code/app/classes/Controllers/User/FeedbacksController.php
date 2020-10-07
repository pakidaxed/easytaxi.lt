<?php

namespace App\Controllers\User;

use App\Abstracts\UserController;
use App\App;
use App\Feedbacks\Feedback;
use App\Views\Forms\AddFeedbackForm;
use App\Views\Pages\IndexPage;
use Core\Router;
use Core\Views\Content;

class FeedbacksController extends UserController
{


    /**
     * Showing feedback to the registered users ar letting them to add new comment

     *
     * @return string|null
     */
    function index(): ?string
    {
        $feedbacks = App::$db->getRowsWhere('feedbacks', []);

        $addFeedbackForm = new AddFeedbackForm();

        if ($addFeedbackForm->isSubmitted()) {
            if (App::$session->getUser()) {
                if ($addFeedbackForm->validate()) {
                    $feedback = new Feedback($addFeedbackForm->getSubmitData());
                    $feedback->setName(App::$session->getUser()['firstname']);
                    App::$db->insertRow('feedbacks', $feedback->_getData());
                    //$addFeedbackForm->setMessage('Comment added succesfuly');
                    Router::redirect('feedbacks-user');
                }
            } else {
                $addFeedbackForm->setMessage('You must be registered to leave a comment');
            }
        }

        $content = new Content(['feedbacks' => array_reverse($feedbacks), 'form' => $addFeedbackForm->render()]);

        $indexPage = new IndexPage();
        $indexPage->setTitle('Customer feedbacks');
        $indexPage->setContent($content->render('feedbacks.tpl.php'));
        return $indexPage->render();
    }
}