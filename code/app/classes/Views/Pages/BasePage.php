<?php
namespace App\Views\Pages;

use App\Views\Navigation;
use Core\Views\Page;

class BasePage extends Page
{
    
    public function __construct()
    {
        $nav = new Navigation();
        $this->setTitle('Unknown page');
        $this->addCSS('style.css');
        $this->addCSS('normalize.css');
        $this->setHeader($nav->render());
        $this->setContent('MAIN');
        $this->setFooter('© 2020. Tomas Jucius, All rights reserved.');

    }
}