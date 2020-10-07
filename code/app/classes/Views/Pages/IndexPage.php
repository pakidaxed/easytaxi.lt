<?php

namespace App\Views\Pages;

use Core\View;

class IndexPage extends BasePage
{

    public function __construct()
    {
        $theContent = new View();

        parent::__construct();
        $this->setTitle('Welcome');
        $this->setContent($theContent->render(ROOT . '/app/templates/content/index.tpl.php'));
    }
}
