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

    public function updateAction()
    {
        // action body
//        $user_mapper = new Application_Model_UserMapper();
//        $user = $user_mapper->getUserById(1);
//        $user->email = 'new_email@test.local';
//        $user_mapper->save($user);

        $user = Doctrine_Core::getTable('Model_User')->findOneByEmailAndPassword('bez.niczego@gmail.com', 'bezniczego');
        $user->password = 'test';
        $user->save();
    }

    public function addAction()
    {
        // action body

        //        adding user with OldUser model
        //        $user = new Application_Model_User();
        //        $user->email = 'nikko@test.local';
        //        $user->salt = sha1(time());
        //        $user->password = 'test';
        //        $user->date_created = date('Y-m-d H:i:s');
        //
        //        $user_mapper = new Application_Model_UserMapper();
        //        $user_mapper->save($user);

        // using Doctrine
        $user = new Model_User();
        $user->email = 'bez.niczego@gmail.com';
        $user->password = 'bezniczego';
        $user->salt = sha1(time());
        $user->date_created = date('Y-m-d H:i:s');
        $user->save();
    }


}





