<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    public function _initDoctrine()
    {
        // require the Doctrine.php file
        require_once 'Doctrine.php';

        // Get a Zend Autoloader instance
        $loader = Zend_Loader_Autoloader::getInstance();

        // Autoload all the Doctrine files
        $loader->pushAutoloader(array('Doctrine', 'autoload'));

        // Get the Doctrine settings from application.ini
        $doctrineConfig = $this->getOption('doctrine');

        // Get a Doctrine Manager instance so we can set some settings
        $manager = Doctrine_Manager::getInstance();

        // set models to be autoloaded and not included (Doctrine_Core::MODEL_LOADING_AGGRESSIVE)
        $manager->setAttribute(
            Doctrine::ATTR_MODEL_LOADING,
            Doctrine::MODEL_LOADING_CONSERVATIVE);

        // enable ModelTable classes to be loaded automatically
        $manager->setAttribute(
            Doctrine_Core::ATTR_AUTOLOAD_TABLE_CLASSES,
            true
        );

        // enable validation on save()
        $manager->setAttribute(
            Doctrine_Core::ATTR_VALIDATE,
            Doctrine_Core::VALIDATE_ALL
        );

        // enable sql callbacks to make SoftDelete and other behaviours work transparently
        $manager->setAttribute(
            Doctrine_Core::ATTR_USE_DQL_CALLBACKS,
            true
        );

        // not entirely sure what this does :)
        $manager->setAttribute(
            Doctrine_Core::ATTR_AUTO_ACCESSOR_OVERRIDE,
            true
        );

        // enable automatic queries resource freeing
        $manager->setAttribute(
            Doctrine_Core::ATTR_AUTO_FREE_QUERY_OBJECTS,
            true
        );

        // connect to database
        $manager->openConnection($doctrineConfig['connection_string']);

        // set to utf8
        $manager->connection()->setCharset('utf8');

        return $manager;
    }

    protected function _initAutoload()
    {
        // Add autoloader empty namespace
        $autoLoader = Zend_Loader_Autoloader::getInstance();
        $resourceLoader = new Zend_Loader_Autoloader_Resource(array(
            'basePath' => APPLICATION_PATH,
            'namespace' => '',
            'resourceTypes' => array(
                'model' => array(
                    'path' => 'models/',
                    'namespace' => 'Model_'
                )
            ),
        ));
        // Return it so that it can be stored by the bootstrap
        return $autoLoader;
    }

    function _initView()
    {

        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace('Twig');
        $autoloader->registerNamespace('Zwig');

        $view = new Zwig_View(array(
            'encoding' => 'UTF-8',
            'helperPath' => array(),
        ));

        $loader = new Twig_Loader_Filesystem(array());
        $zwig = new Zwig_Environment($view, $loader, array(
            'cache' => APPLICATION_PATH . '/cache/twig/',
            'auto_reload' => true,
        ));

        $view->setEngine($zwig);
        $view->doctype(Zend_View_Helper_Doctype::HTML5);

        $viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer($view, array(
            'viewSuffix' => 'twig',
        ));
        Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);

        return $view;
    }
}

