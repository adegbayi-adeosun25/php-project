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


        switch ($action) {
            case 'restartSession':
                $this->mainController->forgetSession();
                break;

            case 'summary':
                $this->mainController->summaryAction();
                break;

            case 'people':
                $this->mainController->peopleAction();
                break;

            case 'news':
                $this->mainController->newsAction();
                break;

            case 'info':
                $this->mainController->infoAction();
                break;

            case 'contact':
                $this->mainController->contactAction();
                break;

            case 'about':
                $this->mainController->aboutAction();
                break;

            case 'logout':
                $this->mainController->logoutAction();
                break;

            case 'processLogin':
                $this->mainController->processLoginAction();
                break;

            case 'login':
                $this->mainController->loginAction();
                break;

            case 'setBackgroundColorPink':
                $this->mainController->changeBackgroundColor('pink');
                break;

            case 'setBackgroundColorYellow':
                $this->mainController->changeBackgroundColor('yellow');
                break;

            case 'newHit':
                $this->mainController->newHit();
                break;

            case 'home':
            default:
                $this->mainController->homeAction();


        }
    }

}