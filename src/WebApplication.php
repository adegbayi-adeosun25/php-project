<?php

namespace Itb;


class WebApplication
{
    const PATH_TO_TEMPLATES = __DIR__ . '/../views';

    private $mainController;

    public function __construct()
    {
        $twig = new \Twig\Environment(new \Twig_Loader_Filesystem(self::PATH_TO_TEMPLATES));
        $this->mainController = new MainController($twig);
    }

    public function run()
    {
        $action = filter_input(INPUT_GET, 'action');

//        print 'action = ' . $action;
//        die();

        switch ($action) {
            case 'about':
                $this->mainController->aboutAction();
                break;

            case 'summary':
                $this->mainController->summaryAction();
                break;

            case 'info':
                $this->mainController->infoAction();
                break;

            case 'contact':
                $this->mainController->contactAction();
                break;

            case 'news':
                $this->mainController->newsAction();
                break;

            case 'people':
                $this->mainController->peopleAction();
                break;



            case 'home':
            default:
                $this->mainController->homeAction();
        }
    }



}