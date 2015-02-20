<?php


/**
 * Class BookingsWebModule
 * @package Modules
 * @subpackage Bookings
 */
class BookingsWebModule extends WebModule
{
    protected $id = 'bookings';

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