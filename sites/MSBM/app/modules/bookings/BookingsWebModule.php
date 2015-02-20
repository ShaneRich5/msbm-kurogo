<?php
/**
 * Created by PhpStorm.
 * User: Shane
 * Date: 2/19/2015
 * Time: 9:03 AM
 */

class BookingsWebModule extends WebModule
{
    protected $id = 'booking';

    protected function initializeForPage()
    {
        switch($this->page)
        {
            case 'index':
                $this->assign('message', 'Hello World');
                $this->assign('url', $this->buildBreadcrumbURL('book', array()));
                break;
            case 'book':

                break;
            default:
                parent::initializeForPage();
        }
    }
}