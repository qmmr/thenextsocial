<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $this->view->currentDateAndTime = date('d-m-Y, H:i:s', time());
    }


}

